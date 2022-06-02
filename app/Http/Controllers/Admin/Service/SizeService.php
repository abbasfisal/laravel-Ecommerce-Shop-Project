<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeService extends Controller
{
    /**
     * return  data with pagination
     *
     * @param null $perPage
     * @return mixed
     */
    public static function getWithPagination($perPage = null)
    {
        return Size::paginate($perPage ?? config('shop.perPage'));
    }

    /**
     * store new size in db
     * @param \App\Http\Requests\StoreSizeRequest $request
     */
    public static function create(Request $request)
    {
        return Size::create($request->toArray());
    }

}
