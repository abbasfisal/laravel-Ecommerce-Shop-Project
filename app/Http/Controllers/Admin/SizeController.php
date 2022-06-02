<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Service\SizeService;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = SizeService::getWithPagination();
        return view('admin.sizes.index',compact('sizes'));
    }
}
