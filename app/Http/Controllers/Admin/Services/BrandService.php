<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;

class BrandService extends Controller
{

    public static function getWithPaginate($perPage = null)
    {
        return Brand::query()
                    ->paginate($perPage ?? config('shop.perPage'));
    }

    public static function getAll()
    {
        return Brand::all();
    }

    public static function create(StoreBrandRequest $request)
    {
        $imageName = uploadService::handle($request->image, config('shop.brandImagePath'));

        Brand::query()
             ->create([
                 Brand::c_title => $request->title,
                 Brand::c_slug  => SLUG($request->slug),
                 Brand::c_image => $imageName
             ]);
    }
}
