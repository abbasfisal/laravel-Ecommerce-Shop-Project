<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\BrandService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;

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
        return redirect(route('index.brand'))->with('succ', msg_succ());
    }

    public function ShowEdit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function Update(UpdateBrandRequest $request)
    {
        $brand_update_result = BrandService::Update($request);

        if ($brand_update_result === false)
            return redirect()
                ->back()
                ->with('fail', config('fail', 'fail_update'));

        return redirect(route('index.brand'));
    }

}
