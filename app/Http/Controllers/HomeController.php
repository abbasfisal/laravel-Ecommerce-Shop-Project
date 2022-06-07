<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\Services\CategoryService;
use App\Http\Controllers\Admin\Services\ProductService;
use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        //TODO :if loged in get basket info

        //get all product by pagination
        $products = ProductService::getWithPagination();
        //dd($products->toArray());

        //get menue
        $maincategories = CategoryService::getMainCategories();

        return view('home', compact('products', 'maincategories'));
    }

    public function getSingleProduct(Product $product, $slug)
    {
        return view('singleproduct', compact('product'));
    }
}
