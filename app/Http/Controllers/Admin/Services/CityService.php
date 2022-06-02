<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityService extends Controller
{
    /**
     * store new city to db
     * @param Request $request
     */
    public static function createCity(Request $request)
    {
        return City::create($request->toArray());
    }
}
