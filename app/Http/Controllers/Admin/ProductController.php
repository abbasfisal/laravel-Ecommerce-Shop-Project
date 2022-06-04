<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\BrandService;
use App\Http\Controllers\Admin\Services\CategoryService;
use App\Http\Controllers\Admin\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\getSubCategoryRequest;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        //TODO Pass proudct data as a table
        return view('admin.products.index');
    }

    public function create()
    {
        $categories = CategoryService::getMainCategories();
        $brands = BrandService::getAll();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    /**
     * store new data in db
     */
    public function store(StoreProductRequest $request)
    {
        ProductService::create($request);

    }


    /***
     * get sub Category by id
     */
    public function getSubCategory(getSubCategoryRequest $request)
    {

        $subcategories = CategoryService::getSubCatByCategory($request->category_id);

        return response()->json($subcategories);
    }
}
