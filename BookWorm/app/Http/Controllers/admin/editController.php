<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\addBookRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use App\book;
use App\price;
use App\category;
class editController extends Controller
{
    public function getEditBook($id){

        $book= book::with(['category','price'])->where('id',$id)->get();
        $category=category::all();
        return view('admin.editBook',['book'=>$book,'category'=>$category]);
    }
    public function postEditBook(addBookRequest $request,$id){

        $book=book::find($id);

        $price=price::find($book->id_price);

        $price->buyPrice=$request->buyPrice;
        $price->sellPrice=$request->sellPrice;
        $price->save();
        $book->id_sale=1;



        $book->name = $request->name;
        $book->author = $request->author;
        $book->id_category = $request->category;
        $book->language = $request->language;
        $book->pageNumber = $request->pageNumber;
        $book->weight = $request->weight;
        $book->size = $request->size;
        $book->description = $request->description;
        $book->type = $request->type;
        if (isset($request->image)) {// upload image fail!!
            $book->image= $request->image;
        }



        $book->wordwise = $request->wordwise;
        $book->downloads = 0;
        $book->save();
        return redirect('admin/getBook');
    }



}