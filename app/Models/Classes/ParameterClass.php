<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

class ParameterClass extends Model
{

    protected $fillable = ['name'];

    public function parameters()
    {
        return $this->hasMany('App\Models\Entities\Parameter');
    }

}
