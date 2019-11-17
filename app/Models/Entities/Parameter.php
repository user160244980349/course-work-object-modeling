<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $guarded = ['id'];

    public function parameter_class()
    {
        return $this->belongsTo('App\Models\Classes\ParameterClass');
    }

    public function parameter_type()
    {
        return $this->belongsTo('App\Models\Entities\ValueType');
    }

    public function metric()
    {
        return $this->belongsTo('App\Models\Entities\Metric');
    }

    public function parametrized()
    {
        return $this->morphTo();
    }

    public function valuable()
    {
        return $this->morphTo();
    }

}
