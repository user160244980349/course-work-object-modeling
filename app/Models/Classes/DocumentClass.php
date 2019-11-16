<?php

namespace App\Models\Classes;

use App\Models\Entities\Document;
use Illuminate\Database\Eloquent\Model;

class DocumentClass extends Model
{

    protected $fillable = ['name'];

    public function documents()
    {
        return $this->hasMany('App\Models\Entities\Document');
    }

}
