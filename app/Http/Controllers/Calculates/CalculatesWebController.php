<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use App\Models\Classes\ProductClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CalculatesWebController extends Controller
{

    public function step1(Request $request)
    {
        return view('calculation/step1')
            ->with(['classes' => ProductClass::all()]);
    }

    public function results(Request $request)
    {
        return view('calculation/results')
            ->with([
                'class' => Session::get('normalization_class'),
                'levels' => Session::get('normalized_levels'),
                'product' => Session::get('product'),
            ]);
    }

}
