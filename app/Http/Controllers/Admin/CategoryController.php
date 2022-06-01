<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = CategoryService::getAll();
        $cats_paginate = CategoryService::getWithPaginate();
        return view('admin.categories.index', compact('categories','cats_paginate'));
    }

    public function store(StoreCategoryRequest $request)
    {

        CategoryService::createNew($request);
        return redirect(route('index.category'))->with('success', 'successfully created');
    }
}
