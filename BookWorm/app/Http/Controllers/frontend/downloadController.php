<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class downloadController extends Controller
{
    public function getDownload($link){
        return Storage::download('fileDownload/'.$link  );


    }
}
