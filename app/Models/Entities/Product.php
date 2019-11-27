<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function product_class()
    {
        return $this->belongsTo('App\Models\Classes\ProductClass');
    }

    public function value_type()
    {
        return $this->belongsTo('App\Models\Entities\ValueType');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Entities\Document');
    }

    public function parameters()
    {
        return $this->morphMany('App\Models\Entities\Parameter', 'parametrized');
    }

    public function conf_params()
    {
        return $this->hasMany('App\Models\Entities\ConfigureParameter');
    }

    public function conf_strings()
    {
        return $this->hasManyThrough('App\Models\ParameterValues\ConfigureString', 'App\Models\Entities\ConfigureParameter');
    }

    public function metric()
    {
        return $this->belongsTo('App\Models\Entities\Metric');
    }

    public function positions()
    {
        return $this->hasMany('App\Models\Entities\ProductPosition');
    }

    public function positions_recurse()
    {
        return $this->hasMany('App\Models\Entities\ProductPosition')->with('content_recurse');
    }

    public function inclusions()
    {
        return $this->hasMany('App\Models\Entities\ProductPosition', 'position_content_id');
    }

    public function predicate_instances()
    {
        return $this->hasMany('App\Models\Entities\PredicateInstance');
    }

}
