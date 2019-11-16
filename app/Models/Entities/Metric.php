<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{

    protected $fillable = [
        'name', 'extended_name'
    ];

    public function parameters()
    {
        return $this->hasMany('App\Models\Entities\Parameter');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Entities\Product');
    }

}
