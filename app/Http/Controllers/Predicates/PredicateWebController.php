<?php

namespace App\Http\Controllers\Predicates;

use App\Http\Controllers\Controller;
use App\Models\Entities\Predicate;

class PredicateWebController extends Controller
{

    public function index()
    {
        return view('predicates/index')
            ->with([
                'predicates' => Predicate::all(),
            ]);
    }

    public function create()
    {
        return view('predicates/create');
    }

    public function read($id)
    {
        return view('predicates/read', ['predicate' => Predicate::find($id)]);
    }

}
