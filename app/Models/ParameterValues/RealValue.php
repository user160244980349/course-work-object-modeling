<?php

namespace App\Models\ParameterValues;

use Illuminate\Database\Eloquent\Model;

class RealValue extends Model
{
    protected $guarded = ['id'];

    public function valuable()
    {
        return $this->morphOne('App\Models\Entities\Parameter', 'valuable');
    }

}
