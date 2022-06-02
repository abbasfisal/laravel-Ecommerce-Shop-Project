<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Size;

class SizeService extends Controller
{
    //
    public static function getWithPagination($perPage = null)
    {
        return Size::paginate($perPage ?? config('shop.perPage'));
    }

}
