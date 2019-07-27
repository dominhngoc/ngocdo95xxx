<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use Searchable;

    protected $table='book';
    public function sale(){
        return $this->belongsTo('App\sale','id_sale','id');
    }
    public function price(){
        return $this->belongsTo('App\price','id_price','id');
    }
    public function category(){
        return $this->belongsTo('App\category','id_category','id');
    }
    public function books_link(){
        return $this->hasMany('App\books_link','id_book','id');
    }

    public $timestamps = true;

    public function searchableAs()
    {
        return 'bookworm';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }
}
