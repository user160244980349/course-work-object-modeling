<?php

namespace App\Http\Controllers\Predicates;

use App\Http\Controllers\Controller;
use App\Models\Entities\Predicate;
use App\Models\Entities\Product;
use Illuminate\Support\Facades\Session;

class PredicateWebController extends Controller
{

    public function step1($prod_id)
    {
        return view('predicates/step1')
            ->with(['product' => Product::find($prod_id)]);
    }

    public function step2($prod_id)
    {
        return view('predicates/step2')
            ->with(['product' => Product::find($prod_id)])
            ->with(['predicate' => Session::get('predicate')])
            ->with(['parameters' => Session::get('parameters')]);
    }

    public function step3($prod_id)
    {
        return view('predicates/step3')
            ->with(['product' => Product::find($prod_id)])
            ->with(['predicate' => Session::get('predicate')])
            ->with(['parameters' => Session::get('parameters')]);
    }

    public function read($prod_id, $id)
    {
        return view('predicates/read')
            ->with(['product' => Product::find($prod_id)])
            ->with(['predicate' => Predicate::find($id)]);
    }

}
