<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class FormalParameter extends Model
{
    protected $guarded = ['id'];

    public function predicate_instance()
    {
        return $this->belongsTo('App\Models\Entities\PredicateInstance', 'predicate_instance_id');
    }

    public function parameter()
    {
        return $this->belongsTo('App\Models\Entities\ConfigureParameter', 'configure_parameter_id');
    }

    public function value()
    {
        return $this->belongsTo('App\Models\ParameterValues\ConfigureString', 'configure_string_id');
    }

}
