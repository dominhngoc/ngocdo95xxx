<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class infor extends Model
{
    protected $table='infor';
    public function address(){
        return $this->belongsTo('App\user','id_user','id');
    }
}
