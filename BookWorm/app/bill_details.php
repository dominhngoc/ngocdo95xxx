<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_details extends Model
{
    protected $table='bill_details';

    public function bills(){
        return $this->belongsTo('App\bills','id_bill','id');
    }
    public $timestamps = false;
}
