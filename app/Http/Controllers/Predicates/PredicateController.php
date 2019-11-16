<?php

namespace App\Http\Controllers\Predicates;

use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\FormalParameter;
use App\Models\Entities\Parameter;
use App\Models\Entities\Predicate;
use App\Models\Entities\Product;
use App\Models\ParameterValues\ConfigureString;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class PredicateController extends Controller
{

    public function step1(Request $request, $prod_id)
    {
        $predicate = new Predicate([
            'name' => $request->input('name'),
            'expression' => $request->input('expression'),
        ]);
        $predicate->product()->associate(Product::find($prod_id));

        $parameters_names = array();
        preg_match_all('/{([a-zA-Z0-9]+)}/', $predicate->expression, $parameters_names);
        $parameters_names = $parameters_names[1];

        $parameter_models = new Collection();

        foreach ($parameters_names as $parameter_name) {
            $parameter_models->push(new FormalParameter([
                'name' => $parameter_name,
            ]));
        }

        Session::put('predicate',  $predicate);
        Session::put('parameters',  $parameter_models);

        return redirect()->route('web.products.predicates.step2', ['prod_id' => $prod_id]);
    }

    public function step2(Request $request, $prod_id)
    {
        $predicate = Session::get('predicate');
        $formal_parameters = Session::get('parameters');
        $fact_parameters_ids = $request->input('parameters');

        for ($i = 0; $i < count($formal_parameters); $i++) {
            $formal_parameters[$i]->actual_parameter()->associate(ConfigureParameter::find($fact_parameters_ids[$i]));
        }

        Session::put('predicate', $predicate);
        Session::put('parameters', $formal_parameters);

        return redirect()->route('web.products.predicates.step3', ['prod_id' => $prod_id]);
    }

    public function step3(Request $request, $prod_id)
    {
        $predicate = Session::get('predicate');
        $formal_parameters = Session::get('parameters');
        $parameter_values = $request->input('values');

        $predicate->product()->associate(Product::find($prod_id));
        $predicate->save();

        for ($i = 0; $i < count($parameter_values); $i++) {
            $formal_parameters[$i]->predicate()->associate($predicate);
            $formal_parameters[$i]->actual_value()->associate(ConfigureString::find($parameter_values[$i]));
            $formal_parameters[$i]->save();
        }

        return redirect()->route('web.products.read', ['prod_id' => $prod_id]);
    }

    public function delete($prod_id, $id)
    {
        $predicate = Product::find($prod_id)->predicates()->find($id);

        $predicate->formal_parameters()->delete();
        $predicate->delete();

        return redirect()->route('web.products.read', ['prod_id' => $prod_id]);
    }

}
