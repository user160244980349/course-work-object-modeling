<?php

namespace App\Http\Controllers\ConfigurePositions;

use App\Http\Controllers\Controller;
use App\Models\Entities\Product;
use Illuminate\Database\Eloquent\Collection;

class ConfigureVariantsWebController extends Controller
{

    public function index($prod_id)
    {
        $product = Product::find($prod_id);
        $subtree = Product::where('id', '=', $prod_id)->with('positions_recurse')->first();

        $level = -1;
        $content_list = new Collection;
        $this->recurse_leveling($content_list, $level, $subtree);
//        $content_list->shift();
        $levels = $content_list->groupBy('level');
//        dd($levels);
        return view('configure_variants/index')
            ->with(['product' => $product])
            ->with(['levels' => $levels]);
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

}
