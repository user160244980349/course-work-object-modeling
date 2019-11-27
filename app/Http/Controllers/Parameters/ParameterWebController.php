<?php

namespace App\Http\Controllers\Parameters;

use App\Models\Classes\ParameterClass;
use App\Models\Entities\Document;
use App\Models\Entities\Metric;
use App\Models\Entities\Parameter;
use App\Models\Entities\Product;
use App\Models\Entities\ValueType;
use Illuminate\Routing\Controller;

class ParameterWebController extends Controller
{

    public function createInDoc($prod_id, $doc_id)
    {
        return view('parameters_for_docs/create')
            ->with(['product' => Product::find($prod_id)])
            ->with(['document' => Document::find($doc_id)])
            ->with(['class' => ParameterClass::find(1)])
            ->with(['metrics' => Metric::all()])
            ->with(['types' => ValueType::all()]);
    }

    public function readInDoc($prod_id, $doc_id, $id)
    {
        return view('parameters_for_docs/read')
            ->with(['product' => Product::find($prod_id)])
            ->with(['document' => Document::find($doc_id)])
            ->with(['parameter' => Parameter::find($id)]);
    }

    public function updateInDoc($prod_id, $doc_id, $id)
    {
        return view('parameters_for_docs/update')
            ->with(['product' => Product::find($prod_id)])
            ->with(['document' => Document::find($doc_id)])
            ->with(['parameter' => Parameter::find($id)]);
    }

    public function createInProd($prod_id)
    {
        return view('parameters_for_prods/create')
            ->with(['product' => Product::find($prod_id)])
            ->with(['types' => ValueType::all()])
            ->with(['metrics' => Metric::all()])
            ->with(['class' => ParameterClass::find(1)]);
    }

    public function readInProd($prod_id, $id)
    {
        return view('parameters_for_prods/read')
            ->with(['product' => Product::find($prod_id)])
            ->with(['parameter' => Parameter::find($id)]);
    }

    public function updateInProd($prod_id, $id)
    {
        return view('parameters_for_prods/update')
            ->with(['product' => Product::find($prod_id)])
            ->with(['parameter' => Parameter::find($id)]);
    }

}
