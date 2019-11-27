<?php

namespace App\Http\Controllers\BuildVariants;

use App\Http\Controllers\Controller;
use App\Models\Entities\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
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
        $subtree = Product::where('id', '=', $product->id)
            ->with('positions')
            ->first();

        $level = -1;
        $content_list = new Collection;
        $this->groupProductsByLevel(
            $content_list,
            $level,
            $subtree,
            null,
            $product->id,
            $actuals
        );
        $content_list->shift();

        $levels = $content_list->groupBy('level');

        Session::put('levels', $levels);

        return redirect()->route('web.build.results');
    }

    private function groupProductsByLevel(&$content_list,
                                          &$level,
                                          &$subtree,
                                          $count,
                                          $rootId,
                                          $actuals)
    {

        $level++;

        $subtree->count = $count;
        $subtree->level = $level;
        $content_list->push($subtree);

        foreach ($subtree->positions_recurse as $position) {

            $predicate_instance = $position
                ->predicate_instances()
                ->where('product_id', '=', $rootId)->first();

            if (isset($predicate_instance)) {
                $predicate = $predicate_instance->predicate;
                $formals = $predicate_instance->formal_parameters;

                foreach ($formals as $formal) {
                    $predicate->replaceWith(
                        $formal->name,
                        $formal->value->id == $actuals[$formal->parameter->id] ? 1 : 0
                    );
                }

                if (intval($predicate->calculate()) > 0) {
                    $this->groupProductsByLevel(
                        $content_list,
                        $level,
                        $position->content_recurse,
                        $position->valuable->value,
                        $rootId,
                        $actuals
                    );
                }
                continue;
            }

            $this->groupProductsByLevel($content_list,
                $level,
                $position->content_recurse,
                $position->valuable->value,
                $rootId,
                $actuals
            );
        }

        $level--;
        return;
    }

}
