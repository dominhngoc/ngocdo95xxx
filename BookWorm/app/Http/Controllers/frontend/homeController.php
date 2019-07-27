<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\book;
use App\category;
use App\dcategory;
use DB;
use App\user;

class homeController extends Controller
{
    public function postLoginFrontend(Request $rq){

        $email= $rq->username;
        $password=$rq->password;
        $user=user::with('infor')->where('email',$email)->where('password', $password)->first();


        if($user) {

            session(['userId'=>$user->id]);
            session(['userName'=>$user->infor->name]);
            return 'success';

        }
        else{
             return 'Incorrect username or password';
        }


    }
    public function getLogoutFrontend(Request $rq){
        $rq->session()->forget('userId');
        $rq->session()->forget('userName');
        return redirect()->route('Home');

    }
    public function getHome(){


//      dd((session()->has('userId')));
        $book=book::with(['price'])->paginate(12);

        $new=book::where('type','1')->take(4)->get();

        $newBook=$book=book::with(['price'])->paginate(10);


        $dcategory=dcategory::with(['category'])->get();
        return view('frontend.home',['book'=>$book,'new'=>$new,'newBook'=>$newBook,'dcategory'=>$dcategory]);
    }
    public function getBooks(Request $rq){



        $book=book::with(['price'])->paginate(12);


        return view('frontend.item', compact('book'))->render();



    }
    public function getSearch(Request $rq){


        $keyWord=$rq->input('search');
        $dcategory=dcategory::with(['category'])->get();
        $book=book::search($keyWord)->paginate(12);

        return view('frontend.search',['dcategory'=>$dcategory,'book'=>$book,'keyWord'=>$keyWord]);



    }
    public function getSearchUrl($search){


        $keyWord=urldecode($search);


        $dcategory=dcategory::with(['category'])->get();
        $book=book::search($keyWord)->paginate(12);

        return view('frontend.search',['dcategory'=>$dcategory,'book'=>$book,'keyWord'=>$keyWord]);



    }
    public function index()
    {
        return view('frontend.searchTest');
    }

    public function fetch(Request $request)
    {
        if($request->get('query')&& $request->get('query')!='')
        {
            $query = $request->get('query');
            $data =  $book=book::search($query)->take(5)->get();
//            dd($data);
//            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
//            foreach($data as $row)
//            {
//                $output .= '
//       <li><a href="#">'.$row->name.'</a></li>
//       ';
//            }
//            $output .= '</ul>';
//            echo $output;
            return view('frontend.searchItem', compact('data'))->render();
        }
    }

}
