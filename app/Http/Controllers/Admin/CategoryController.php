<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = CategoryService::getAll();
        $cats_paginate = CategoryService::getWithPaginate();
        return view('admin.categories.index', compact('categories', 'cats_paginate'));
    }


    public function store(StoreCategoryRequest $request)
    {

        CategoryService::createNew($request);
        return redirect(route('index.category'))->with('success', config('shop.msg.create'));

    }

    /**
     * show edit form
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function ShowEdit(Category $category)
    {
        $is_parent_check = CategoryService::CheckIsParent($category);

        if ($is_parent_check) {
            $categories = CategoryService::getAll();
        }

        return view('admin.categories.edit', compact('category', isset($categories) ? 'categories' : null));
    }

    public function Update(UpdateCategoryRequest $request)
    {
        $category_update_result = CategoryService::Update($request);
        if (!$category_update_result)
            return redirect()
                ->back()
                ->with('fail', config('shop.msg.fail_update'));

        return redirect()
            ->back()
            ->with('success', config('shop.msg.update'));
    }

}
