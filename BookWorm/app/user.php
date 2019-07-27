<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table='user';
    public function defaultKey(){
        return $this->hasMany('App\defaultKey','id_user','id');
    }
    public function address(){
        return $this->hasMany('App\address','id_user','id');
    }
    public function bills(){
        return $this->hasMany('App\bills','id_user','id');
    }
    public function infor(){
        return $this->hasOne('App\infor','id_user','id');
    }
    public $timestamps = true;

}