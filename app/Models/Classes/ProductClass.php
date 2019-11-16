<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

class ProductClass extends Model
{

    protected $fillable = [
        'name', 'terminal_in', 'terminal_out'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Entities\Product');
    }

}
