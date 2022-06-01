<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\BrandService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;

class BrandController extends Controller
{
    public function index()
    {

        $brands = BrandService::getAll();
        $brands_paginate = BrandService::getWithPaginate(3);
        return view('admin.brands.index', compact('brands', 'brands_paginate'));
    }

    public function store(StoreBrandRequest $request)
    {
        BrandService::create($request);
        return redirect(route('index.brand'))->with('succ',msg_succ());
    }
}
