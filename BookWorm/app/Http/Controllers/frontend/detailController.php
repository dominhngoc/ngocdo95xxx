<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\book;
use App\books_link;
use App\category;
use App\dcategory;
use DB;
class detailController extends Controller
{
    public function getDetail($id,$pageType){
        //data to xu ly

        $book=book::find($id);
        $id_category=$book->id_category;
        $category=category::find(1);
        $id_dCategory=$category->id_loai;
        $categoryName=$category->name;
        $dCategory=dcategory::find($id_dCategory)->name;
        $bookLink=array($dCategory,$categoryName);



//        //data push to view
        $vBook=book::where('id',$id)->get();
        $vSameCategory=book::where('id_category',$id_category)->take(10)->get();
        $downloadLink=books_link::where('id_book',$book->id)->get();

        if($pageType==1)
            return view('frontend.ebookDetail',
                [
                    'book'=>$vBook,
                    'sameCategory'=>$vSameCategory,
                    'bookLink'=>$bookLink,
                    'downloadLink'=>$downloadLink,
                    'pageType'=>1
                ]);
        else{
            return view('frontend.paperBookDetail',
                [
                    'book'=>$vBook,
                    'sameCategory'=>$vSameCategory,
                    'bookLink'=>$bookLink,
                    'downloadLink'=>$downloadLink,
                    'pageType'=>2
                ]);
        }
    }
}
