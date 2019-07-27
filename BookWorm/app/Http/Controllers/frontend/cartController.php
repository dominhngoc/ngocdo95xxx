<?php

namespace App\Http\Controllers\frontend;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use App\book;
use App\address;
use App\user;
use App\bills;
use App\defaultKey;
use App\bill_details;
class cartController extends Controller
{
    public function getAddCart(Request $rq,$id){
        $rq->session()->push('items', $id);
        $itemNumber=count(session('items'));
        session(['itemNumber' => $itemNumber]);
        return redirect()->back();
//        return view('frontend.master',['itemNumber'=>$itemNumber]);
    }
    public function getCart(Request $rq){
        if($rq->session()->has('items')){
            $arr=( session('items'));

            $cartItem=[];

            foreach($arr as $id){

                $book=book::where('id',$id)->get();
                array_push($cartItem, $book);
            }

            return view('frontend.cart',['cartItem'=>$cartItem]);
        }
        return view('frontend.cart');

    }
    public function flashCart(Request $rq){
        $rq ->session()->forget('bill');
        echo session('bill');
//        return view('frontend.cart');
    }
    public function getSetBill(Request $rq){
        $input = Input::get();
        foreach($input as $key => $value){
            if($key=="_token"){
                continue;
            }
            // handle data
            $id = str_after($key,'quantity');
            $rq->session()->push('bill.'.$id, $id);
            $rq->session()->push('bill.'.$id, $value);
        }
        return redirect()->route('getAddressConfirm');
    }
    public function getAddressConfirm(Request $rq){
        session(['userId'=>'2']);
        $id_user=session('userId');

//       dd($id_user);
        $default_key=defaultKey::where('id_user','2')->get();
        $key=($default_key->toArray()[0]['value']); // get default address value
        $address=address::where('id_user',$id_user)->get();
        return view('frontend.addressConfirm',['address'=>$address,'default_key'=>$key]);
    }
//$something = new Something;
//$something->name = Input::get('name');
//$something->url = Input::get('url');
//$something->save();
//
//$user = new User;
//$user->email = Input::get('email');
//$user->password = Hash::make(Input::get('password'));
//
//$something->users()->save($user);
    public function getPayment(Request $rq,$id)
    {
        $id_adress=0;
        //set user
        $id_user = session('userId');
        // create address
        if($id==0){
            $id_adress=user::with('defaultKey')->find($id_user)->defaultKey->toArray()[0]['value'];

        }
        else{
            $id_adress =$id;
        }

//        create bill
        $bill = new bills();
        $bill->note = "giao truoc 12h";
        $bill->status = "Pendding";
        $bill->id_user = $id_user;
        $bill->id_shipper = '0';
        $bill->id_address = $id_adress;
        $bill->total = 0;
        $bill->profit = 0;
        $bill->save();


        // get bill details from bill session
        $arr = session('bill');
        // init total and profit for bill
        $total = 0;
        $profit = 0;
        foreach ($arr as $key) {
//               load all bill details in session
            $bill_details = new bill_details();
            //$key[0] : id of the book
            //$key[1]: quantity of cart item
            $book = book::find($key[0]);
            //get book name
            $bill_details->bookName = $book->name;
            //get book price
            $price = book::with('price')->where('id', $key[0])->get();
            $price = $price->first()->price->toArray();// return array of row price


            $bill_details->price = $price['sellPrice'];
            $bill_details->buyPrice = $price['buyPrice'];


//               calcule total bill detail
            $bill_details->total = $price['sellPrice'] * $key[1];
            $bill_details->profit = ($price['sellPrice'] - $price['buyPrice']) * $key[1];

            $bill_details->quantity = $key[1];
            $bill->bill_details()->save($bill_details);

            $total += $bill_details->total;
            $profit += $bill_details->profit;
        }
        // update for bill
        $bill->total = $total;
        $bill->profit = $profit;
        $bill->save();
        $rq ->session()->forget(['bill','items','itemNumber']);
//        $rq ->session()->forget('items');
        return view('frontend.successOrder');
    }
}
