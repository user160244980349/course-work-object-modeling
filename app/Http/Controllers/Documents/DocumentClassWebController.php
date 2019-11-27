<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;

class DocumentClassWebController extends Controller
{

    public function index()
    {
        return view('document_classes/index')
            ->with(['classes' => DocumentClass::all()]);
    }

    public function create()
    {
        return view('document_classes/create')
            ->with(['classes' => DocumentClass::all()]);
    }

    public function read($id)
    {
        return view('document_classes/read')
            ->with(['class' => DocumentClass::find($id)]);
    }

    public function update($id)
    {
        return view('document_classes/update')
            ->with(['class' => DocumentClass::find($id)]);
    }

}
