<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Classes\ProductClass;
use App\Models\Entities\Metric;
use App\Models\Entities\Product;
use App\Models\Entities\ValueType;

class ProductWebController extends Controller
{

    public function index()
    {
        return view('products/index')
            ->with(['products' => Product::all()]);
    }

    public function create()
    {
        return view('products/create')
            ->with(['metrics' => Metric::all()])
            ->with(['types' => ValueType::all()])
            ->with(['classes' => ProductClass::all()]);
    }

    public function read($id)
    {
        return view('products/read')
            ->with(['product' => Product::find($id)]);
    }

    public function update($id)
    {
        return view('products/update')
            ->with(['product' => Product::find($id)]);
    }

}
