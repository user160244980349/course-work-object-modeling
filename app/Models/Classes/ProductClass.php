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

    public function parent_class()
    {
        return $this->belongsTo('App\Models\Classes\ProductClass', 'parent_id');
    }

    public function child_class()
    {
        return $this->hasOne('App\Models\Classes\ProductClass', 'parent_id');
    }

}
