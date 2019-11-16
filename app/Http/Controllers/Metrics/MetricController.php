<?php

namespace App\Http\Controllers\Metrics;

use App\Http\Controllers\Controller;
use App\Models\Classes\DocumentClass;
use App\Models\Entities\Metric;
use Illuminate\Http\Request;

class MetricController extends Controller
{

    public function create(Request $request)
    {
        Metric::create([
            'name' => $request->input('name'),
            'extended_name' => $request->input('extended_name'),
        ]);

        return redirect()->route('web.metrics.index');
    }

    public function update(Request $request, $id)
    {
        Metric::find($id)->update([
            'name' => $request->input('name'),
            'extended_name' => $request->input('extended_name'),
        ]);

        return redirect()->route('web.metrics.read', ['id' => $id]);
    }

    public function delete($id)
    {

        if (Metric::find($id)->products->isNotEmpty() || Metric::find($id)->parameters->isNotEmpty())
            return view('error', [
                'error_text' => 'Невозможно удалить ресурс, пока он связан с другими ресурсами'
            ]);
        Metric::find($id)->delete();

        return redirect()->route('web.metrics.index');
    }

}
