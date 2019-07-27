<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use App\bill_details;
use App\price;
use App\sale;
use App\category;
class deleteController extends Controller
{
    public function getDeleteBook($id){


        $book=book::find($id);

        $id_price=$book->id_price;
        $book->delete();

        $price=price::find($id_price)->delete();
        return redirect()->route('getBook');
    }

    public function getDeleteSale($id){
        book::where('id_sale',$id)->update(['id_sale'=>1]);
        sale::where('id',$id)->delete();


        return redirect()->route('getSale') ;
    }

    public function getDeleteCategory($id){
        book::where('id_category',$id)->delete();
        $category=category::find($id);
        $category->delete();


        return back() ;
    }
}
