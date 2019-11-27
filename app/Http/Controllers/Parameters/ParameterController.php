<?php

namespace App\Http\Controllers\Parameters;

use App\Http\Controllers\Controller;
use App\Models\Classes\ParameterClass;
use App\Models\Entities\Document;
use App\Models\Entities\Metric;
use App\Models\Entities\Parameter;
use App\Models\Entities\Product;
use App\Models\Entities\ValueType;
use Illuminate\Http\Request;

class ParameterController extends Controller
{

    public function createInDoc(Request $request, $prod_id, $doc_id)
    {
        $this->create($request, $doc_id, Document::class);

        return redirect()->route('web.documents.read', ['prod_id' => $prod_id, 'doc_id' => $doc_id]);
    }

    public function create(Request $request, $id, $owner_class)
    {
        $owner = $owner_class::find($id);
        $type = ValueType::find($request->input('type'));
        $class = ParameterClass::find(1);
        $metric = Metric::find($request->input('metric'));

        $parameter = new Parameter([
            'name' => $request->input('name'),
        ]);

        $value = $type->value_model::create([
            'value' => str_replace(',', '.', $request->input('value')),
        ]);

        $parameter->metric()->associate($metric);
        $parameter->valuable()->associate($value);
        $parameter->parametrized()->associate($owner);
        $parameter->parameter_type()->associate($type);
        $parameter->parameter_class()->associate($class);

        $parameter->save();

        return;
    }

    public function deleteInDoc($prod_id, $doc_id, $id)
    {
        $this->delete($doc_id, $id, Document::class);

        return redirect()->route('web.documents.read', ['prod_id' => $prod_id, 'doc_id' => $doc_id]);
    }

    public function delete($owner_id, $id, $owner_class)
    {
        $parameter = $owner_class::find($owner_id)->parameters()->find($id);

        $parameter->valuable()->delete();
        $parameter->delete();

        return;
    }

    public function updateInDoc(Request $request, $prod_id, $doc_id, $id)
    {
        $this->update($request, $doc_id, $id, Document::class);

        return redirect()->route('web.documents.parameter.read', ['prod_id' => $prod_id, 'doc_id' => $doc_id, 'id' => $id]);
    }

    public function update(Request $request, $owner_id, $id, $owner_class)
    {
        $value = $owner_class::find($owner_id)->parameters()->find($id)->valuable;
        $value->value = $request->input('value');
        $value->save();

        return;
    }

    public function createInProd(Request $request, $prod_id)
    {
        $this->create($request, $prod_id, Product::class);

        return redirect()->route('web.products.read', ['prod_id' => $prod_id]);
    }

    public function deleteInProd($prod_id, $id)
    {
        $this->delete($prod_id, $id, Product::class);

        return redirect()->route('web.products.read', ['id' => $prod_id]);
    }

    public function updateInProd(Request $request, $prod_id, $id)
    {
        $this->update($request, $prod_id, $id, Product::class);

        return redirect()->route('web.products.parameter.read', ['prod_id' => $prod_id, 'id' => $id]);
    }

}
