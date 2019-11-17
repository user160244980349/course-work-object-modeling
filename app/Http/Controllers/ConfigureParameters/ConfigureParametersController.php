<?php

namespace App\Http\Controllers\ConfigureParameters;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use App\Models\Classes\ParameterClass;
use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\Metric;
use App\Models\Entities\Product;
use App\Models\ParameterValues\ConfigureString;
use Illuminate\Http\Request;
use App\Models\Entities\Document;

class ConfigureParametersController extends Controller
{

    public function create(Request $request, $prod_id)
    {
        $product = Product::find($prod_id);
        $class = ParameterClass::find(2);
        $metric = Metric::find($request->input('metric'));

        $parameter = new ConfigureParameter([
            'name' => $request->input('name'),
        ]);

        $parameter->product()->associate($product);
        $parameter->parameter_class()->associate($class);
        $parameter->metric()->associate($metric);

        $parameter->save();

        return redirect()->route('web.products.configure.parameters.read', ['prod_id' => $prod_id, 'id' => $parameter->id]);
    }

    public function delete($prod_id, $id)
    {
        if (ConfigureParameter::find($id)->formal_parameters->isNotEmpty())
            return view('error', [
                'error_text' => 'Невозможно удалить ресурс, пока он связан с другими ресурсами'
            ]);

        ConfigureParameter::find($id)->strings()->delete();
        ConfigureParameter::find($id)->delete();

        return redirect()->route('web.products.read', ['id' => $prod_id]);
    }

}
