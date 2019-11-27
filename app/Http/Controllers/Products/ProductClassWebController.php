<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Classes\ProductClass;

class ProductClassWebController extends Controller
{

    public function index()
    {
        return view('product_classes/index')
            ->with(['classes' => ProductClass::all()]);
    }

    public function create()
    {
        return view('product_classes/create')
            ->with(['classes' => ProductClass::all()]);
    }

    public function read($id)
    {
        return view('product_classes/read')
            ->with(['class' => ProductClass::find($id)]);
    }

    public function update($id)
    {
        return view('product_classes/update')
            ->with(['class' => ProductClass::find($id)]);
    }

}
