<?php

namespace App\Http\Controllers\ConfigureStrings;

use App\Http\Controllers\Controller;
use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\Product;

class ConfigureStringsWebController extends Controller
{

    public function create($prod_id, $id)
    {
        return view('configure_strings/create')
            ->with(['parameter' => ConfigureParameter::find($id)])
            ->with(['product' => Product::find($prod_id)]);
    }

}
