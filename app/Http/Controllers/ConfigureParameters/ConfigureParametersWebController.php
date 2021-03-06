<?php

namespace App\Http\Controllers\ConfigureParameters;

use App\Http\Controllers\Controller;
use App\Models\Classes\ParameterClass;
use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\Metric;
use App\Models\Entities\Product;

class ConfigureParametersWebController extends Controller
{

    public function create($prod_id)
    {
        return view('configure_parameters/create')
            ->with(['product' => Product::find($prod_id)])
            ->with(['metrics' => Metric::all()])
            ->with(['class' => ParameterClass::where('name', '=', 'Конфигурационный')->first()]);
    }

    public function read($prod_id, $id)
    {
        return view('configure_parameters/read')
            ->with(['product' => Product::find($prod_id)])
            ->with(['parameter' => ConfigureParameter::find($id)]);
    }

}
