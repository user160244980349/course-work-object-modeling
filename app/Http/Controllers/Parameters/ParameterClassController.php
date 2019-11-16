<?php

namespace App\Http\Controllers\Parameters;

use App\Http\Controllers\Controller;
use App\Models\Classes\ParameterClass;
use Illuminate\Http\Request;

class ParameterClassController extends Controller
{

    public function create(Request $request)
    {
        ParameterClass::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('web.parameter_classes.index');
    }

    public function update(Request $request, $id)
    {
        ParameterClass::find($id)->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('web.parameter_classes.read', ['id' => $id]);
    }

    public function delete(Request $request, $id)
    {
        if (ParameterClass::find($id)->parameters->isNotEmpty())
            return view('error', [
                'error_text' => 'Невозможно удалить ресурс, пока он связан с другими ресурсами'
            ]);

        ParameterClass::find($id)->delete();

        return redirect()->route('web.parameter_classes.index');
    }

}
