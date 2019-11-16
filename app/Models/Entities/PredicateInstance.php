<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PredicateInstance extends Model
{

    public function product()
    {
        return $this->belongsTo('App\Models\Entities\Product');
    }

    public function actual_parameters()
    {
        return $this->hasMany('App\Models\Entities\ActualParameter');
    }

    public function predicate()
    {
        return $this->hasMany('App\Models\Entities\ActualParameter');
    }

    public function positions()
    {
        return $this->belongsToMany('App\Models\Entities\ProductPosition', 'predicate_product_position', 'predicate_id', 'product_position_id');
    }

}
