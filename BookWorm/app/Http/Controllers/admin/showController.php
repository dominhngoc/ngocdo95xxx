<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\saleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use App\book;
use App\bills;
use App\category;
use App\dcategory;
use App\bill_details;
use App\shipper;
use App\address;
use App\sale;
use App\users;
use DB;
class showController extends Controller
{
    public function master(){





        return view('admin.master');
    }
    public function getBook(){


        $book=book::all();
        $book= book::with(['category','price'])->get();

        return view('admin.quanlysach',['book'=>$book]);
    }
    public function getCategory(){

        $category=category::with(['dcategory'])->get();

        $category->each(function(&$ctg) use (&$bookNumber) // foreach($posts as $post) { }
        {
            $bookNumber=(count(book::where('id_category',$ctg->id)->get()));
            category::where('id',$ctg->id)->update(array(
                'bookNumber'=>$bookNumber,
            ));
        });
        $dcategory=dcategory::all();
        return view('admin.AddCategory',['category'=>$category, 'bookNumber'=>$bookNumber,'dcategory'=>$dcategory]);
    }
    public function getAddDCategory(){


        return view('admin.addDCategory');
    }
    public function postAddDCategory(Request $rq){
        $dcategory=new dcategory();
        $dcategory->name=$rq->name;
        $dcategory->logo=$rq->logo;
        $dcategory->bookNumber=0;
        $dcategory->save();
        return redirect()->route('getCategory');
    }

    public function getEditDCategory(){
        $dcategory=dcategory::all();
        return view('admin.EditDCategory',['dcategory'=>$dcategory]);
    }
    public function postEditDCategory(Request $rq){


        dcategory::where('id', $rq->dcategory)->update(array('name'=>$rq->name));
        return redirect()->route('getCategory');
    }
    public function getDeleteDCategory(){
        $dcategory=dcategory::all();
        return view('admin.deleteDCategory',['dcategory'=>$dcategory]);
    }
    public function postDeleteDCategory(Request $rq){
        DB::table('category')->where('id_loai', $rq->dcategory)->delete();
        $dcategory=dcategory::find($rq->dcategory);
        $dcategory->delete();

        return redirect()->route('getCategory');
    }

    public function getBill(){


//        $bill=bills::all();
        $shipper=shipper::all();
        $bill= bills::with(['address'])->get();

//        dd($bill->customer->name);
        return view('admin.quanlydon',['bill'=>$bill,'shipper'=>$shipper]);
    }

    public function getBillDetail($id){
        $bill= bills::find($id);
        $id_address=$bill->id_address;
        $address=address::where('id',$id)->get();

        $bill_details=bill_details::where('id_bill',$id)->get();

        $bills=bills::where('id',$id)->get();
        return view('admin.billDetails',['customer'=>$address,'bill_details'=>$bill_details,'bills'=>$bills]);
    }
    public function getSale()
    {
        $category=category::all();
        $sale=sale::all();
        return view('admin.quanlysale',['category'=>$category,'sale'=>$sale]);
    }
    public function postSale(saleRequest $rq)
    {
        $id_category=$rq->category;


        $sale=new sale();
        $sale->saleName=$rq->saleName;
        $sale->salePrice=$rq->salePrice;
        $sale->categorySale=category::find($id_category)->name;
        $sale->save();


//        dd($id_category) ;

        book::where('id_category',$id_category)->update(['id_sale' => $sale->id]);
        return redirect()->route('getSale');
    }


    public function getHome()
    {
        $book=book::all();
        $numberOfBook=count($book);

        $user=users::all();
        $numberOfUser=count($user);

        $downloads=0;

        $book->each(function($bk) use (&$downloads) // foreach($posts as $post) { }
        {
            $downloads+=$bk->downloads;

        });

        $bill=bills::all();

        $profit=0;

        $bill->each(function($b) use (&$profit) // foreach($posts as $post) { }
        {
            $profit+=$b->profit;

        });

//        dd($downLoads);
        return view('admin.home',['numberOfBook'=>$numberOfBook,'downloads'=>$downloads,'numberOfUser'=>$numberOfUser,'profit'=>$profit]);
    }
    public function getCalendar(){
        return view('admin.calendar');
    }
}
