<?php

namespace App\Http\Controllers\ProductPositions;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use App\Models\Entities\Product;
use App\Models\Entities\ProductPosition;
use Illuminate\Http\Request;
use App\Models\Entities\Document;

class ProductPositionsController extends Controller
{

    public function create(Request $request, $prod_id)
    {
        $product = Product::find($prod_id);
        $content = Product::find($request->input('product'));

        $valuable = new $content->value_type->value_model([
            'value' => $request->input('count'),
        ]);
        $valuable->save();

        $position = new ProductPosition();

        $position->valuable()->associate($valuable);
        $position->product()->associate($product);
        $position->content()->associate($content);

        $position->save();

        return redirect()->route('web.products.read', ['prod_id' => $prod_id]);
    }

    public function update(Request $request, $prod_id, $id)
    {
        $position = Product::find($prod_id)->positions()->find($id);
        $position->valuable->value = $request->input('count');
        $position->valuable->save();

        return redirect()->route('web.products.positions.read', ['prod_id' => $prod_id, 'pos_id' => $id]);
    }

    public function delete($prod_id, $id)
    {
        $position = Product::find($prod_id)->positions()->find($id);

        $position->valuable()->delete();
        $position->delete();

        return redirect()->route('web.products.read', ['prod_id' => $prod_id]);
    }

}
