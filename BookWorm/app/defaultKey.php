<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class defaultKey extends Model
{
    protected $table='defaultKey';
    public function user(){
        return $this->belongsTo('App\user','id_user','id');
    }
}
