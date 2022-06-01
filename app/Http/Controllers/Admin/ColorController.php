<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\ColorService;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index()
    {
        $colors = ColorService::getWithPaginate();
        return view('admin.colors.index', compact('colors'));
    }

    public function store()
    {
        dd(request()->all());
    }
}
