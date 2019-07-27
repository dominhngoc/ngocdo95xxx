<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table='category';
    public function book(){
        return $this->hasMany('App\book','id_category','id');
    }
    public function dcategory(){
        return $this->belongsTo('App\dcategory','id_loai','id');
    }
    public $timestamps = true;
}
