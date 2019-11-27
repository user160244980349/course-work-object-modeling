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

    public function parent_class_recursive()
    {
        return $this->belongsTo('App\Models\Classes\ProductClass', 'parent_id')->with('parent_class_recursive');
    }

    public function child_class()
    {
        return $this->hasOne('App\Models\Classes\ProductClass', 'parent_id');
    }

    public function inheritedFrom($class)
    {
        $var = $this;

        while ($var != null) {
            if ($var->name == $class->name) return true;
            $var = $var->parent_class_recursive;
        }

        return false;
    }

}
