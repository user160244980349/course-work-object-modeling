<?php

namespace App\Http\Controllers\ConfigurePositions;

use App\Http\Controllers\Controller;
use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\FormalParameter;
use App\Models\Entities\Predicate;
use App\Models\Entities\PredicateInstance;
use App\Models\Entities\Product;
use App\Models\Entities\ProductPosition;
use App\Models\ParameterValues\ConfigureString;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConfigurePositionsController extends Controller
{

    public function step1(Request $request, $prod_id, $pos_id)
    {
        $product = Product::find($prod_id);
        $position = ProductPosition::find($pos_id);
        $predicate = Predicate::find($request->input('predicate'));

        $predicate_inst = new PredicateInstance();

        $predicate_inst->product()->associate($product);
        $predicate_inst->position()->associate($position);
        $predicate_inst->predicate()->associate($predicate);

        $names = $predicate->parameter_names();

        $parameter_models = new Collection;

        foreach ($names as $name) {
            $parameter_models->push(new FormalParameter([
                'name' => $name,
            ]));
        }

        Session::put('product', $product);
        Session::put('position', $position);
        Session::put('predicate', $predicate);
        Session::put('predicate_inst', $predicate_inst);
        Session::put('parameter_models', $parameter_models);

        return redirect()->route('web.products.configure.positions.step2', ['prod_id' => $prod_id, 'id' => $pos_id]);
    }

    public function step2(Request $request, $prod_id, $pos_id)
    {
        $product = Session::get('product');
        $position = Session::get('position');
        $predicate = Session::get('predicate');
        $predicate_inst = Session::get('predicate_inst');
        $parameter_models = Session::get('parameter_models');

        $fact_parameters_ids = $request->input('parameters');
        for ($i = 0; $i < count($parameter_models); $i++) {
            $parameter_models[$i]->parameter()->associate(ConfigureParameter::find($fact_parameters_ids[$i]));
        }

        Session::put('product', $product);
        Session::put('position', $position);
        Session::put('predicate', $predicate);
        Session::put('predicate_inst', $predicate_inst);
        Session::put('parameter_models', $parameter_models);

        return redirect()->route('web.products.configure.positions.step3', ['prod_id' => $prod_id, 'id' => $pos_id]);
    }

    public function step3(Request $request, $prod_id)
    {
        $product = Session::get('product');
        $position = Session::get('position');
        $predicate = Session::get('predicate');
        $predicate_inst = Session::get('predicate_inst');
        $parameter_models = Session::get('parameter_models');

        $parameter_values = $request->input('values');
        $predicate_inst->save();

        for ($i = 0; $i < count($parameter_values); $i++) {
            $parameter_models[$i]->predicate_instance()->associate($predicate_inst);
            $parameter_models[$i]->value()->associate(ConfigureString::find($parameter_values[$i]));
            $parameter_models[$i]->save();
        }

        return redirect()->route('web.products.configure.positions.index', ['prod_id' => $prod_id]);
    }

    public function delete($prod_id, $pos_id)
    {
        $product = Product::find($prod_id);
        $position = ProductPosition::find($pos_id);

        $predicate_instance = $position->predicate_instances()->where('product_id', '=', $prod_id)->first();

        $predicate_instance->formal_parameters()->delete();
        $predicate_instance->delete();

        return redirect()->route('web.products.configure.positions.index', ['prod_id' => $prod_id]);
    }

}
