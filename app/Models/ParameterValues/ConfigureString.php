<?php

namespace App\Models\ParameterValues;

use Illuminate\Database\Eloquent\Model;

class ConfigureString extends Model
{
    protected $guarded = ['id'];

    public function formal_parameters()
    {
        return $this->hasMany('App\Models\Entities\FormalParameter', 'configure_string_id');
    }

    public function parameter()
    {
        return $this->belongsTo('App\Models\Entities\ConfigureParameter', 'configure_parameter_id');
    }

}
