<?php

namespace App\Http\Controllers\ProductPositions;

use App\Http\Controllers\Controller;
use App\Models\Entities\Product;
use App\Models\Entities\ProductPosition;

class ProductPositionsWebController extends Controller
{

    public function create($prod_id)
    {
        return view('product_positions/create')
            ->with(['products' => Product::where('id', '!=', $prod_id)->whereHas('product_class', function ($query) {
                $query->where('terminal_out', false);
            })->get()])
            ->with(['product' => Product::find($prod_id)]);
    }

    public function read($prod_id, $id)
    {
        return view('product_positions/read')
            ->with(['position' => ProductPosition::find($id)])
            ->with(['product' => Product::find($prod_id)]);
    }

    public function update($prod_id, $id)
    {
        return view('product_positions/update')
            ->with(['position' => ProductPosition::find($id)])
            ->with(['products' => Product::all()])
            ->with(['product' => Product::find($prod_id)]);
    }

}
