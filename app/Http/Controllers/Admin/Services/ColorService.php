<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Symfony\Component\HttpFoundation\Request;

class ColorService extends Controller
{
    /**
     * return data with pagination
     * @param null $perPage
     * @return mixed
     */
    public static function getWithPaginate($perPage = null)
    {
        return Color::paginate($perPage ?? config('shop.perPage'));
    }

    /**
     * store new data in db
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public static function create(Request $request)
    {
        return Color::query()
                    ->create($request->toArray());
    }

    /**
     * get all color
     * @return mixed
     */
    public static function getAll()
    {
        return Color::get();
    }
}
