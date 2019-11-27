<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use App\Models\Classes\ProductClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CalculatesController extends Controller
{

    public function results(Request $request)
    {
        $class = ProductClass::find($request->input('class'));
        Session::put('class', $class);

        $levels = Session::get('levels');

        dd($levels, $class);

        Session::put('levels', $levels);
        return redirect()->route('web.build.calculate.result');
    }

}
