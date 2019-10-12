<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = 'products';

    public $primaryKey = 'id';

    public $timestamps = true;


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

