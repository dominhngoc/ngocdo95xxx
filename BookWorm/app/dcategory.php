<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dcategory extends Model
{
    protected $table='dcategory';
    public function category(){
        return $this->hasMany('App\category','id_loai','id');
    }
    public $timestamps = false;
}
