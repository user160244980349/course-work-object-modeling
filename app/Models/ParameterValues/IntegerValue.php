<?php

namespace App\Models\ParameterValues;

use Illuminate\Database\Eloquent\Model;

class IntegerValue extends Model
{

    protected $fillable = [
        'value'
    ];

    public function valuable()
    {
        return $this->morphOne('App\Models\Entities\Parameter', 'valuable');
    }

}
