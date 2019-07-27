<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\addBookRequest;
use App\Http\Requests\addCategoryRequest;
use App\book;
use App\price;
use App\category;
class addController extends Controller
{
    public function getAddBook(){
        $category= category::all();

        return view('admin.addBook',['category'=>$category]);
    }
    public function postAddBook(addBookRequest $request){
        $price = new price;
        $price->buyPrice=$request->buyPrice;
        $price->sellPrice=$request->sellPrice;

        $price->save();
        $book = new Book;
        $book->name = $request->name;
        $book->author = $request->author;
        $book->id_category = $request->category;
        $book->language = $request->language;
        $book->pageNumber = $request->pageNumber;
        $book->weight = $request->weight;
        $book->size = $request->size;
        $book->description = $request->description;
        $book->type = $request->type;
        $book->image = $request->image;
        $book->wordwise = $request->wordwise;
        $book->downloads = 0;
        $book->id_sale=1;
        $price->book()->save($book);
        return redirect('admin/getBook');


    }
    public function postAddCategory(addCategoryRequest $rq){

        $category=new category();
        $category->name=$rq->name;
        $category->logo=$rq->logo;
        $category->id_loai=$rq->dcategory;
        $category->bookNumber=0;
        $category->save();
        return back();

    }
}

