<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class ConfigureParameter extends Model
{

    protected $fillable = [
        'name',
    ];

    public function parameter_class()
    {
        return $this->belongsTo('App\Models\Classes\ParameterClass');
    }

    public function strings()
    {
        return $this->hasMany('App\Models\ParameterValues\ConfigureString', 'configure_parameter_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Entities\Product');
    }

    public function formal_parameters()
    {
        return $this->hasMany('App\Models\Entities\FormalParameter', 'actual_parameter_id');
    }

    public function metric()
    {
        return $this->belongsTo('App\Models\Entities\Metric');
    }

}
