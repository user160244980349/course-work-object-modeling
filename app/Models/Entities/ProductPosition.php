<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductPosition extends Model
{

    protected $fillable = [
        'name', 'product_id', 'position_content_id', 'predicate_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Entities\Product');
    }

    public function content()
    {
        return $this->belongsTo('App\Models\Entities\Product', 'position_content_id');
    }

    public function content_recurse()
    {
        return $this->belongsTo('App\Models\Entities\Product', 'position_content_id')->with('positions_recurse');
    }

    public function valuable()
    {
        return $this->morphTo();
    }

    public function predicates()
    {
        return $this->belongsToMany('App\Models\Entities\Predicate', 'predicate_product_position', 'product_position_id', 'predicate_id');
    }

}
