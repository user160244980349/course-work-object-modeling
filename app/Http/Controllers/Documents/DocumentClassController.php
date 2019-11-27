<?php

namespace App\Http\Controllers\Documents;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use Illuminate\Http\Request;

class DocumentClassController extends Controller
{

    public function create(Request $request)
    {
        $document_class = DocumentClass::create([
            'name' => $request->input('name'),
        ]);

        $document_class->parent_class()->associate(DocumentClass::find($request->input('parent')));
        $document_class->save();

        return redirect()->route('web.document_classes.index');
    }

    public function update(Request $request, $id)
    {
        $document_class = DocumentClass::find($id);
        if ($document_class->name == 'Документация')
            return view('error', [
                'error_text' => 'Невозможно изменить базовый классификатор'
            ]);

        $document_class->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('web.document_classes.read', ['id' => $id]);
    }

    public function delete($id)
    {
        $document_class = DocumentClass::find($id);
        if ($document_class->name == 'Документация')
            return view('error', [
                'error_text' => 'Невозможно удалить базовый классификатор'
            ]);

        if ($document_class->documents->isNotEmpty()
            || isset($document_class->child_class))
            return view('error', [
                'error_text' => 'Невозможно удалить ресурс, пока он связан с другими ресурсами'
            ]);

        $document_class->delete();

        return redirect()->route('web.document_classes.index');
    }

}
