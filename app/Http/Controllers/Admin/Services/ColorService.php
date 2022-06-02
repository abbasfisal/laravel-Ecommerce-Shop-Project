<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Symfony\Component\HttpFoundation\Request;

class ColorService extends Controller
{
    //
    public static function getWithPaginate($perPage = null)
    {
        return Color::paginate($perPage ?? config('shop.perPage'));
    }

    public static function create(Request $request)
    {

        return Color::query()
                    ->create($request->toArray());
    }
}
