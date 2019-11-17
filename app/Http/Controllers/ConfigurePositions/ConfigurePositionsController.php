<?php

namespace App\Http\Controllers\ConfigurePositions;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use App\Models\Classes\ParameterClass;
use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\Metric;
use App\Models\Entities\Predicate;
use App\Models\Entities\Product;
use App\Models\Entities\ProductPosition;
use App\Models\ParameterValues\ConfigureString;
use Illuminate\Http\Request;
use App\Models\Entities\Document;

class ConfigureVariantsController extends Controller
{

    public function create(Request $request, $prod_id, $pos_id)
    {
        $position = ProductPosition::find($pos_id);
        $predicate = Predicate::find($request->input('predicate'));

        $predicate->positions()->attach($position);

        return redirect()->route('web.products.configure.variants.index', ['prod_id' => $prod_id]);
    }

    public function delete($prod_id, $pos_id, $pred_id)
    {
        $position = ProductPosition::find($pos_id);
        $predicate = Predicate::find($pred_id);

        $position->predicates()->detach($predicate);

        return redirect()->route('web.products.configure.variants.index', ['prod_id' => $prod_id]);
    }

}
