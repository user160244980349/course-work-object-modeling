<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class FormalParameter extends Model
{

    protected $fillable = [
        'name', 'value', 'predicate_id'
    ];

    public function predicate()
    {
        return $this->belongsTo('App\Models\Entities\Predicate');
    }

    public function actual_parameter()
    {
        return $this->belongsTo('App\Models\Entities\ConfigureParameter', 'actual_parameter_id');
    }

}
