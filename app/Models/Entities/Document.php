<?php

namespace App\Models\Entities;

use App\Models\Classes\DocumentClass;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = [
        'name', 'document_class_id', 'product_id',
    ];

    public function document_class()
    {
        return $this->belongsTo('App\Models\Classes\DocumentClass');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Entities\Product');
    }

    public function parameters()
    {
        return $this->morphMany('App\Models\Entities\Parameter', 'parametrized');
    }

}
