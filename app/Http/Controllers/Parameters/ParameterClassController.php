<?php

namespace App\Http\Controllers\Parameters;

use App\Http\Controllers\Controller;
use App\Models\Classes\ParameterClass;
use Illuminate\Http\Request;

class ParameterClassController extends Controller
{

    public function create(Request $request)
    {
        $parameter_class = ParameterClass::create([
            'name' => $request->input('name'),
        ]);

        $parameter_class->parent_class()->associate(ParameterClass::find($request->input('parent')));
        $parameter_class->save();

        return redirect()->route('web.parameter_classes.index');
    }

    public function update(Request $request, $id)
    {
        $parameter_class = ParameterClass::find($id);
        if ($parameter_class->name == 'Описательный'
            || $parameter_class->name == 'Конфигурационный')
            return view('error', [
                'error_text' => 'Невозможно изменить базовый классификатор'
            ]);

        $parameter_class->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('web.parameter_classes.read', ['id' => $id]);
    }

    public function delete(Request $request, $id)
    {
        $parameter_class = ParameterClass::find($id);
        if ($parameter_class->name == 'Описательный'
            || $parameter_class->name == 'Конфигурационный')
            return view('error', [
                'error_text' => 'Невозможно удалить базовый классификатор'
            ]);

        if ($parameter_class->parameters->isNotEmpty()
            || isset($parameter_class->child_class))
            return view('error', [
                'error_text' => 'Невозможно удалить ресурс, пока он связан с другими ресурсами'
            ]);

        ParameterClass::find($id)->delete();

        return redirect()->route('web.parameter_classes.index');
    }

}
