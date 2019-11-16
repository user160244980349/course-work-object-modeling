<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use App\Models\Entities\Document;
use App\Models\Entities\Product;

class DocumentWebController extends Controller
{

    public function create($prod_id)
    {
        return view('documents/create')
            ->with(['product' => Product::find($prod_id)])
            ->with(['classes' => DocumentClass::all()]);
    }

    public function read($prod_id, $id)
    {
        return view('documents/read')
            ->with(['product' => Product::find($prod_id)])
            ->with(['document' => Document::find($id)]);
    }

    public function update($prod_id, $id)
    {
        return view('documents/update')
            ->with(['product' => Product::find($prod_id)])
            ->with(['classes' => DocumentClass::all()])
            ->with(['document' => Document::find($id)]);
    }

}
