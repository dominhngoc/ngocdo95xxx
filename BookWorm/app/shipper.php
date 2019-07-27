<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipper extends Model
{
    protected $table='shipper';
    public function bills(){
        return $this->hasMany('App\bills','id_shipper','id');
    }
    public $timestamps = true;
}
