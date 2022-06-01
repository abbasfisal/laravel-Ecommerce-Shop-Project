<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
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
}
