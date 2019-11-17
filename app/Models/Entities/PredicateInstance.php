<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class PredicateInstance extends Model
{

    public function product()
    {
        return $this->belongsTo('App\Models\Entities\Product');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Entities\ProductPosition', 'product_position_id');
    }

    public function formal_parameters()
    {
        return $this->hasMany('App\Models\Entities\FormalParameter', 'predicate_instance_id');
    }

    public function predicate()
    {
        return $this->belongsTo('App\Models\Entities\Predicate');
    }

}
