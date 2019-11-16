<?php

namespace App\Http\Controllers\ConfigureStrings;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use App\Models\Classes\ParameterClass;
use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\Document;
use App\Models\Entities\Metric;
use App\Models\Entities\Product;
use App\Models\ParameterValues\ConfigureString;

class ConfigureStringsWebController extends Controller
{

    public function create($prod_id, $id)
    {
        return view('configure_strings/create')
            ->with(['parameter' => ConfigureParameter::find($id)])
            ->with(['product' => Product::find($prod_id)]);
    }

}
