<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\uploadService;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

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
        $imageName = uploadService::handle($request->image, config('shop.brandImagePath'), 'brand');

        Brand::query()
             ->create([
                 Brand::c_title => $request->title,
                 Brand::c_slug  => SLUG($request->slug),
                 Brand::c_image => $imageName
             ]);
    }


    public static function Update(Request $request)
    {

        $brand = Brand::query()
                      ->find($request->id);

        if ($request->image != null) {
            uploadService::RemoveImage($brand->image, config('shop.brandImagePath'));
            $uploadImageName = uploadService::handle($request->image, config('shop.brandImagePath'), 'brand');
        }

        return $brand->update([
            'title' => $request->title,
            'slug'  => $request->slug,
            'image' => $request->image ? $uploadImageName : $brand->image,
        ]);
    }


}
