<?php

namespace App\Http\Controllers\frontend;

use App\bill_details;
use App\bills;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;
use App\address;
class accountController extends Controller
{
    public function setUser(){
        session(['userId'=>'2']);
        dd(session()->all());
    }
    public function getAccountManager(){
        $user=user::with('infor')->where('id', session('userId'))->get();



        return view('frontend.accountManager',['user'=>$user]);
    }
    public function getBillManager(){




        $bills=bills::with('bill_details')->where('id_user',session('userId'))->get();
//        dd($bills);


        return view('frontend.billManager',['bills'=>$bills]);
    }
    public function getBillDetailsManager($id){
        $bill=bills::with('address')->where('id',$id)->get();
//        dd($bill);
        $bill_details=bill_details::where('id_bill',$id)->get();
        return view('frontend.billDetailsManager',['bill_details'=>$bill_details,'bill'=>$bill]);
    }
    public function getAddressManager(){
        $address=address::where('id_user',session('userId'))->get();

//        dd($address);

        return view('frontend.addressManager',['address'=>$address]);
    }
    public function postAddAddressManager(Request $rq){
        $address=new address();
        $address->name=$rq->input('name','');
        $address->phoneNumber=$rq->input('phoneNumber','');
        $address->province=$rq->input('province','');
        $address->address=$rq->input('address','');
        $address->id_user=session('userId');
        $address->save();
        return redirect()->route('getAddressManager');
    }
    public function postEditAddressManager(Request $rq){
//        dd($rq->input('id'));
        $address=address::find($rq->input('id',''));
        $address->name=$rq->input('name');
        $address->phoneNumber=$rq->input('phoneNumber','1');
        $address->province=$rq->input('province','');
        $address->address=$rq->input('address','');
        $address->id_user=session('userId','');
        $address->save();
        return redirect()->route('getAddressManager');
    }
}
