<?php

namespace App\Http\Controllers\Metrics;

use App\Http\Controllers\Controller;
use App\Models\Entities\Metric;

class MetricWebController extends Controller
{

    public function index()
    {
        return view('metrics/index')
            ->with(['metrics' => Metric::all()]);
    }

    public function create()
    {
        return view('metrics/create');
    }

    public function read($id)
    {
        return view('metrics/read')
            ->with(['metric' => Metric::find($id)]);
    }

    public function update($id)
    {
        return view('metrics/update')
            ->with(['metric' => Metric::find($id)]);
    }

}
