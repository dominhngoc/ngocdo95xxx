<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table='address';
    public function bills(){
        return $this->hasMany('App\bills','id_address','id');
    }
    public function user(){
        return $this->belongsTo('App\user','id_user','id');
    }
    public $timestamps = true;
}
