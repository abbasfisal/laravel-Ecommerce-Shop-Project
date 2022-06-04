<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductService extends Controller
{

    public static function create(Request $request)
    {
        $productImageName = uploadService::handle($request->file('image'), config('shop.productCoverPath'), 'productCover');


    }
}
