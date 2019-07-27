<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books_link extends Model
{
    protected $table='books_link';
    public function book(){
        return $this->belongsTo('App\book','id_book','id');
    }


}
