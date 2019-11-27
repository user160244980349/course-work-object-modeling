<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;

class DocumentClass extends Model
{
    protected $guarded = ['id'];

    public function documents()
    {
        return $this->hasMany('App\Models\Entities\Document');
    }

    public function parent_class()
    {
        return $this->belongsTo('App\Models\Classes\DocumentClass', 'parent_id');
    }

    public function child_class()
    {
        return $this->hasOne('App\Models\Classes\DocumentClass', 'parent_id');
    }

}
