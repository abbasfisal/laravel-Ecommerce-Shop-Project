<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.products.create');
    }

    /**
     * store new data in db
     */
    public function store(StoreProductRequest $request)
    {

    }
}
