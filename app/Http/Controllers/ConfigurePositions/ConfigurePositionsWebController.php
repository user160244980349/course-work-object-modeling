<?php

namespace App\Http\Controllers\ConfigurePositions;

use App\Http\Controllers\Controller;
use App\Models\Entities\Predicate;
use App\Models\Entities\PredicateInstance;
use App\Models\Entities\Product;
use App\Models\Entities\ProductPosition;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class ConfigurePositionsWebController extends Controller
{

    public function index($prod_id)
    {
        $product = Product::find($prod_id);
        $subtree = Product::where('id', '=', $prod_id)->with('positions_recurse')->first();

        $level = -1;
        $content_list = new Collection;
        $this->recurse_leveling($content_list, $level, $subtree);
        $levels = $content_list->groupBy('level');

        return view('configure_positions/index')
            ->with([
                'predicates' => Predicate::all(),
                'product' => $product,
                'levels' => $levels,
            ]);
    }

    private function recurse_leveling(&$content_list, &$level, &$subtree) {
        $level++;

        $subtree->level = $level;
        $content_list->push($subtree);
        foreach ($subtree->positions_recurse as $position) {
            $this->recurse_leveling($content_list, $level, $position->content_recurse);
        }

        $level--;
        return;
    }

    public function read($prod_id, $pos_id)
    {
        $predicate_instance = PredicateInstance::where('product_id', '=', $prod_id)->where('product_position_id', '=', $pos_id)->with('predicate')->first();

        return view('configure_positions/read')
            ->with([
                'predicate_instance' => $predicate_instance,
                'product' => Product::find($prod_id),
                'position' => ProductPosition::find($pos_id),
            ]);
    }

    public function step1($prod_id, $pos_id)
    {
        return view('configure_positions/step1')
            ->with([
                'predicates' => Predicate::all(),
                'product' => Product::find($prod_id),
                'position' => ProductPosition::find($pos_id),
            ]);
    }

    public function step2($prod_id, $pos_id)
    {
        return view('configure_positions/step2')
            ->with([
                'predicate' => Session::get('predicate'),
                'parameters' => Session::get('parameter_models'),
                'product' => Product::find($prod_id),
                'position' => ProductPosition::find($pos_id),
            ]);
    }

    public function step3($prod_id, $pos_id)
    {
        return view('configure_positions/step3')
            ->with([
                'predicate' => Session::get('predicate'),
                'parameters' => Session::get('parameter_models'),
                'product' => Product::find($prod_id),
                'position' => ProductPosition::find($pos_id),
            ]);
    }

}
