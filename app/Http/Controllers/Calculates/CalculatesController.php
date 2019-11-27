<?php

namespace App\Http\Controllers\Calculates;

use App\Http\Controllers\Controller;
use App\Models\Classes\ProductClass;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CalculatesController extends Controller
{

    public function results(Request $request)
    {
        $class = ProductClass::find($request->input('class'));
        Session::put('normalization_class', $class);

        $levels = Session::get('levels');
        $flat_levels = $levels->flatten();
        $normalized = $flat_levels->filter(function ($value, $key) use ($class) {
            $value->id = $key;
            return $value->product_class->inheritedFrom($class);
        })->groupBy('name');

        $normalized_and_counted = new Collection;
        foreach ($normalized as $key => $products) {
            $normalized_and_counted[$key] = clone $products->first();
            $normalized_and_counted[$key]->count = $products->sum('count');
            unset($normalized_and_counted[$key]->parent);
            unset($normalized_and_counted[$key]->level);
        }

        Session::put('normalized_levels', $normalized_and_counted);
        return redirect()->route('web.build.calculate.results');
    }

}
