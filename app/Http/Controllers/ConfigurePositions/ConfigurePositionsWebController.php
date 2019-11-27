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

        $level = 0;
        $content_list = new Collection;
        $this->groupPositionsByLevel($content_list, $level, $subtree);
        $levels = $content_list->groupBy('level');

        return view('configure_positions/index')
            ->with([
                'predicates' => Predicate::all(),
                'product' => $product,
                'levels' => $levels,
            ]);
    }

    private function groupPositionsByLevel(&$content_list, &$level, &$subtree)
    {
        $level++;

        foreach ($subtree->positions_recurse as $position) {
            $position->level = $level;
            $content_list->push($position);
            $this->groupPositionsByLevel($content_list, $level, $position->content_recurse);
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
        $predicates = Predicate::all();
        if ($predicates->isEmpty()) {
            return view('error')
                ->with([
                    'error_text' => 'Не определены предикаты',
                ]);
        }

        return view('configure_positions/step1')
            ->with([
                'predicates' => $predicates,
                'product' => Product::find($prod_id),
                'position' => ProductPosition::find($pos_id),
            ]);
    }

    public function step2($prod_id, $pos_id)
    {
        $product = Product::find($prod_id);
        if ($product->conf_params->isEmpty()) {
            return view('error')
                ->with([
                    'error_text' => 'Не определены значения для параметров конфигурирования',
                ]);
        }

        return view('configure_positions/step2')
            ->with([
                'predicate' => Session::get('predicate'),
                'parameters' => Session::get('parameter_models'),
                'product' => $product,
                'position' => ProductPosition::find($pos_id),
            ]);
    }

    public function step3($prod_id, $pos_id)
    {
        $product = Product::find($prod_id);
        if ($product->conf_strings->isEmpty()) {
            return view('error')
                ->with([
                    'error_text' => 'Не определены значения для конфигурирования',
                ]);
        }

        return view('configure_positions/step3')
            ->with([
                'predicate' => Session::get('predicate'),
                'parameters' => Session::get('parameter_models'),
                'product' => Product::find($prod_id),
                'position' => ProductPosition::find($pos_id),
            ]);
    }

}
