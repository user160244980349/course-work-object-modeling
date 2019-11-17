<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

class ProductClass extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany('App\Models\Entities\Product');
    }

}
