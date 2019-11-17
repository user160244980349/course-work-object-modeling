<?php

namespace App\Http\Controllers\ConfigureStrings;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use App\Models\Classes\ParameterClass;
use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\Metric;
use App\Models\Entities\Product;
use App\Models\ParameterValues\ConfigureString;
use Illuminate\Http\Request;
use App\Models\Entities\Document;

class ConfigureStringsController extends Controller
{

    public function create(Request $request, $prod_id, $id)
    {
        $parameter = Product::find($prod_id)->conf_params()->find($id);

        $value = new ConfigureString([
            'value' => $request->input('value'),
        ]);

        $value->parameter()->associate($parameter);
        $value->save();

        return redirect()->route('web.products.configure.parameters.read', ['prod_id' => $prod_id, 'id' => $parameter->id]);
    }

    public function delete($prod_id, $conf_id, $id)
    {
        if (ConfigureString::find($id)->formal_parameters->isNotEmpty())
            return view('error', [
                'error_text' => 'Невозможно удалить ресурс, пока он связан с другими ресурсами'
            ]);
        ConfigureString::find($id)->delete();

        return redirect()->route('web.products.configure.parameters.read', ['prod_id' => $prod_id, 'conf_id' => $conf_id]);
    }

}
