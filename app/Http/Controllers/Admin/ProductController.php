<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\BrandService;
use App\Http\Controllers\Admin\Services\CategoryService;
use App\Http\Controllers\Admin\Services\ColorService;
use App\Http\Controllers\Admin\Services\ProductService;
use App\Http\Controllers\Admin\Services\SizeService;
use App\Http\Controllers\Controller;
use App\Http\Requests\getSubCategoryRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductService::getWithPagination();

        return view('admin.products.index' ,compact('products'));
    }

    public function create()
    {
        $categories = CategoryService::getMainCategories();
        $brands = BrandService::getAll();
        $sizes = SizeService::getAll();
        $colors = ColorService::getAll();
        return view('admin.products.create', compact('categories', 'brands', 'colors', 'sizes'));
    }

    /**
     * store new data in db
     */
    public function store(StoreProductRequest $request)
    {
        ProductService::create($request);

        return redirect(route('create.product'))->with('success', config('shop.msg.create'));
    }


    /***
     * get sub Category by id
     */
    public function getSubCategory(getSubCategoryRequest $request)
    {

        $subcategories = CategoryService::getSubCatByCategory($request->category_id);

        return response()->json($subcategories);
    }


    public function getProductById(Product $product , $slug)
    {

        return view('admin.products.product_details'  , compact('product'));
    }
}
