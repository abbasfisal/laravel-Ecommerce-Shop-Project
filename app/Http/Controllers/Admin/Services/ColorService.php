<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Color;

class ColorService extends Controller
{
    //
    public static function getWithPaginate($perPage = null)
    {
        return Color::paginate($perPage ?? config('shop.perPage'));
    }
}
