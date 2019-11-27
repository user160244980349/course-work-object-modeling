<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Classes\ProductClass;
use App\Models\Entities\Metric;
use App\Models\Entities\Product;
use App\Models\Entities\ValueType;
use Illuminate\Http\Request;
use function foo\func;

class ProductController extends Controller
{

    public function create(Request $request)
    {
        $product_class = ProductClass::find($request->input('class'));
        $count_type = ValueType::find($request->input('type'));
        $metric = Metric::find($request->input('metric'));

        $product = new Product([
            'name' => $request->input('name'),
        ]);

        $product->metric()->associate($metric);
        $product->value_type()->associate($count_type);
        $product->product_class()->associate($product_class);
        $product->save();

        return redirect()->route('web.products.index');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->fill([
            'name' => $request->input('name'),
        ]);

        $product->save();

        return redirect()->route('web.products.read', ['id' => $id]);
    }

    public function delete($id)
    {

        if (Product::find($id)->inclusions->isNotEmpty())
            return view('error', [
                'error_text' => 'Невозможно удалить ресурс, пока он связан с другими ресурсами'
            ]);

        $product = Product::find($id);

        $product->parameters()->each(function ($item, $key) {
            $item->valuable()->delete();
        });
        $product->parameters()->delete();

        $product->conf_params()->each(function ($p) {
            $p->strings()->delete();
        });
        $product->conf_params()->delete();

        $product->documents()->each(function ($p) {
            $p->parameters()->each(function ($p) {
               $p->valuable()->delete();
            });
            $p->parameters()->delete();
        });
        $product->documents()->delete();

        $product->positions()->each(function ($p) {
            $p->predicate_instances()->each(function ($p) {
                $p->formal_parameters()->each(function ($p) {
                    $p->strings()->delete();
                });
                $p->formal_parameters()->delete();
            });
            $p->predicate_instances()->delete();
            $p->valuable()->delete();
        });
        $product->positions()->delete();

        $product->delete();

        return redirect()->route('web.products.index');
    }

}
