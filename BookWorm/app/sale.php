<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $table='sale';
    public function book(){
        return $this->hasMany('App\book','id_sale','id');
    }
    public $timestamps = true;
}
