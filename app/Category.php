<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $primaryKey = 'id';

    public function products()
    {
        return $this->hasMany('App\Products');
    }

}
