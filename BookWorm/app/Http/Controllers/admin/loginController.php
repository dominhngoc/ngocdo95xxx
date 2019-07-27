<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\admin;
class loginController extends Controller
{
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(loginRequest $rq){
        $username=$rq->username;
        $password=$rq->password;

        if( admin::where('username',$username)->where('password', $password)->first()) {
            session(['logined' => '']);
            return redirect()->route('getHome');
        }
        else{
            return back();
        }


    }
    public function getLogout(Request $rq){
        $rq->session()->forget('logined');
        return view('admin.login');
    }
}
