<?php

namespace App\Http\Controllers\BuildVariants;

use App\Http\Controllers\Controller;
use App\Models\Entities\Product;
use Illuminate\Support\Facades\Session;

class BuildVariantsWebController extends Controller
{

    public function step1()
    {
        return view('build_variants/step1')
            ->with([
                'products' => Product::all(),
            ]);
    }

    public function step2()
    {
        return view('build_variants/step2')
            ->with([
                'product' => Session::get('product'),
            ]);
    }

    public function results()
    {
        return view('build_variants/results')
            ->with([
                'product' => Session::get('product'),
                'levels' => Session::get('levels'),
            ]);
    }

}
