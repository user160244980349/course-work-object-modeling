<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use Illuminate\Http\Request;

class DocumentClassController extends Controller
{

    public function create(Request $request)
    {
        DocumentClass::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('web.document_classes.index');
    }

    public function update(Request $request, $id)
    {
        DocumentClass::find($id)->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('web.document_classes.read', ['id' => $id]);
    }

    public function delete($id)
    {
        if (DocumentClass::find($id)->documents->isNotEmpty())
            return view('error', [
                'error_text' => 'Невозможно удалить ресурс, пока он связан с другими ресурсами'
            ]);
        DocumentClass::find($id)->delete();

        return redirect()->route('web.document_classes.index');
    }

}
