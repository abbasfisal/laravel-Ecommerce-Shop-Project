<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductService extends Controller
{

    /**
     * store new data to db
     * @param Request $request
     */
    public static function create(Request $request)
    {

        //uplad prodcut image and get uploaded Image
        $request['image'] = uploadService::handle($request->file('image'), config('shop.productCoverPath'), 'productCover');

        Product::create($request->except('main_category'));


    }
}
