<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $table='bills';
    public function bill_details(){
        return $this->hasMany('App\bill_details','id_bill','id');
    }
    public function address(){
        return $this->belongsTo('App\address','id_address','id');
    }
    public function user(){
        return $this->belongsTo('App\user','id_user','id');
    }
    public $timestamps = true;
}
