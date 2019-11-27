<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Classes\ProductClass;
use Illuminate\Http\Request;

class ProductClassController extends Controller
{

    public function create(Request $request)
    {
        ProductClass::create([
            'name' => $request->input('name'),
            'terminal_in' => $request->input('terminal_in') === 'on' ? true : false,
            'terminal_out' => $request->input('terminal_out') === 'on' ? true : false,
        ]);

        return redirect()->route('web.product_classes.index');
    }

    public function update(Request $request, $id)
    {
        $product_class = ProductClass::find($id);
        if ($product_class->name == 'Материал'
            || $product_class->name == 'Сборочная единица'
            || $product_class->name == 'Стандартное изделие'
            || $product_class->name == 'Оконченное изделие')
            return view('error', [
                'error_text' => 'Невозможно изменить базовый классификатор'
            ]);

        $product_class->update([
            'name' => $request->input('name'),
            'terminal_in' => $request->input('terminal_in') === 'on' ? true : false,
            'terminal_out' => $request->input('terminal_out') === 'on' ? true : false,
        ]);

        return redirect()->route('web.product_classes.read', ['id' => $id]);
    }

    public function delete($id)
    {
        $product_class = ProductClass::find($id);
        if ($product_class->name == 'Материал'
            || $product_class->name == 'Сборочная единица'
            || $product_class->name == 'Стандартное изделие'
            || $product_class->name == 'Оконченное изделие')
            return view('error', [
                'error_text' => 'Невозможно удалить базовый классификатор'
            ]);

        if (ProductClass::find($id)->products->isNotEmpty())
            return view('error', [
                'error_text' => 'Невозможно удалить ресурс, пока он связан с другими ресурсами'
            ]);

        ProductClass::find($id)->delete();

        return redirect()->route('web.product_classes.index');
    }

}
