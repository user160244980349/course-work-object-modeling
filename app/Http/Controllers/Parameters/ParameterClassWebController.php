<?php

namespace App\Http\Controllers\Parameters;

use App\Http\Controllers\Controller;
use App\Models\Classes\ParameterClass;

class ParameterClassWebController extends Controller
{

    public function index()
    {
        return view('parameter_classes/index')
            ->with(['classes' => ParameterClass::all()]);
    }

    public function create()
    {
        return view('parameter_classes/create')
            ->with(['classes' => ParameterClass::where('name', '<>', 'Конфигурационный')->get()]);
    }

    public function read($id)
    {
        return view('parameter_classes/read')
            ->with(['class' => ParameterClass::find($id)]);
    }

    public function update($id)
    {
        return view('parameter_classes/update')
            ->with(['class' => ParameterClass::find($id)]);
    }

}
