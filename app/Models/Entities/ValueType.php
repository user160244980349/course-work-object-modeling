<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class ValueType extends Model
{

    protected $fillable = [
        'name'
    ];

    public function parameters()
    {
        return $this->hasMany('App\Models\Entities\Parameter');
    }

    public function countable_products()
    {
        return $this->hasMany('App\Models\Entities\Product');
    }

}
