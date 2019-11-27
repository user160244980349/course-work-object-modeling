<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

class ParameterClass extends Model
{
    protected $guarded = ['id'];

    public function parameters()
    {
        return $this->hasMany('App\Models\Entities\Parameter');
    }

    public function parent_class()
    {
        return $this->belongsTo('App\Models\Classes\ParameterClass', 'parent_id');
    }

    public function child_class()
    {
        return $this->hasOne('App\Models\Classes\ParameterClass', 'parent_id');
    }

}
