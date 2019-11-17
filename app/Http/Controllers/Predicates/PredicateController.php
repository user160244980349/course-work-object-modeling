<?php

namespace App\Http\Controllers\Predicates;

use App\Models\Entities\ConfigureParameter;
use App\Models\Entities\FormalParameter;
use App\Models\Entities\Parameter;
use App\Models\Entities\Predicate;
use App\Models\Entities\Product;
use App\Models\ParameterValues\ConfigureString;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

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
        $predicate->delete();

        return redirect()->route('web.predicates.index');
    }

}
