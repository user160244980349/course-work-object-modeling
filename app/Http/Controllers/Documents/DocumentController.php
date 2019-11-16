<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use App\Models\Entities\Product;
use Illuminate\Http\Request;
use App\Models\Entities\Document;

class DocumentController extends Controller
{

    public function create(Request $request, $prod_id)
    {
        $document_class = DocumentClass::find($request->input('class'));
        $product = Product::find($prod_id);

        $document = new Document([
            'name' => $request->input('name'),
        ]);

        $document->document_class()->associate($document_class);
        $document->product()->associate($product);
        $document->save();

        return redirect()->route('web.products.read', ['prod_id' => $prod_id]);
    }

    public function update(Request $request, $prod_id, $id)
    {
        $document = Product::find($prod_id)->documents()->find($id);

        $document->fill([
            'name' => $request->input('name'),
        ]);

        $document->save();

        return redirect()->route('web.documents.read', ['prod_id' => $prod_id, 'id' => $document->id]);
    }

    public function delete($prod_id, $id)
    {
        $document = Product::find($prod_id)->documents()->find($id);

        $document->parameters()->each(function ($item, $key) {
            $item->valuable()->delete();
        });
        $document->parameters()->delete();
        $document->delete();

        return redirect()->route('web.products.read', ['id' => $prod_id]);
    }

}
