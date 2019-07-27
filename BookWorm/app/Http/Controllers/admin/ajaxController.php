<?php

namespace App\Http\Controllers\admin;

use App\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bills;
use App\book;

use Nexmo\Response;

class ajaxController extends Controller
{
    public function editShipperOnBill(Request $rq)
    {

        $bill = bills::find($rq->id_bill);
        $bill->id_shipper = $rq->id_shipper;
        $bill->save();


    }

    public function getEditCategory(Request $rq)
    {


        category::where('id',$rq->id)->update(['name'=>$rq->name]);

        return back();
    }
}