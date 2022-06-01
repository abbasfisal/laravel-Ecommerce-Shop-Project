<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\CategoryService;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryService::getAll();;
        return view('admin.categories.index', compact('categories'));
    }

    
}
