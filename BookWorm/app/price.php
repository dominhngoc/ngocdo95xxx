<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class price extends Model
{
    protected $table='price';
    public function book(){
        return $this->hasOne('App\book','id_price','id');
    }

    public $timestamps = true;
}
