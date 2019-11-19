<?php

namespace App\Http\Controllers\BuildVariants;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use App\Models\Classes\ParameterClass;
use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\Metric;
use App\Models\Entities\Predicate;
use App\Models\Entities\Product;
use App\Models\ParameterValues\ConfigureString;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Entities\Document;
use Illuminate\Support\Facades\Session;

class BuildVariantsController extends Controller
{

    public function step1(Request $request)
    {
        $product = Product::find($request->input('product'));

        Session::put('product', $product);

        return redirect()->route('web.build.step2');
    }

    public function step2(Request $request)
    {
        $actuals = $request->input('parameters');
        $product = Session::get('product');
        $subtree = Product::where('id', '=', $product->id)->with('positions')->first();

        $level = -1;
        $content_list = new Collection;
        $this->recurse_leveling_with_calculations($content_list, $level, $subtree, $product, $actuals);
        $levels = $content_list->groupBy('level');

        Session::put('levels', $levels);

        return redirect()->route('web.build.results');
    }

    private function recurse_leveling_with_calculations(&$content_list, &$level, &$subtree, $root, $actuals) {
        $level++;

        $subtree->level = $level;
        $content_list->push($subtree);

        foreach ($subtree->positions as $position) {

            $predicate_instance = $position->predicate_instances()->where('product_id', '=', $root->id)->first();

            if (isset($predicate_instance)) {

                $predicate = $predicate_instance->predicate;
                $formals = $predicate_instance->formal_parameters;

                foreach ($formals as $formal) {
                    $predicate->replaceWith($formal->name, $formal->value->id == $actuals[$formal->parameter->id] ? 1 : 0);
                }

                if (intval($predicate->calculate())  > 0) {
                    $this->recurse_leveling_with_calculations($content_list, $level, $position->content, $root, $actuals);
                }
            } else {
                $this->recurse_leveling_with_calculations($content_list, $level, $position->content, $root, $actuals);
            }

        }

        $level--;
        return;
    }

}
