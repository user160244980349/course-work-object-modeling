<?php

namespace App\Http\Controllers\Predicates;

use App\Models\Entities\Predicate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PredicateController extends Controller
{

    public function create(Request $request)
    {
        $predicate = new Predicate([
            'name' => $request->input('name'),
            'expression' => $request->input('expression'),
        ]);
        $predicate->save();

        return redirect()->route('web.predicates.index');
    }

    public function delete($id)
    {
        $predicate = Predicate::find($id);

        if ($predicate->instances->isNotEmpty()) {
            return view('error')
                ->with([
                    'error_text' => 'Невозможно удалить ресурс, пока он связан с другими',
                ]);
        }

        $predicate->delete();

        return redirect()->route('web.predicates.index');
    }

}
