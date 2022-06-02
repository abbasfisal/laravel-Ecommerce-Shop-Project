<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\ColorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColorRequest;

class ColorController extends Controller
{
    public function index()
    {
        $colors = ColorService::getWithPaginate();
        return view('admin.colors.index', compact('colors'));
    }

    public function store(StoreColorRequest $request)
    {
        ColorService::create($request);
        return redirect(route('index.color'))->with('success', msg_succ());
    }
}
