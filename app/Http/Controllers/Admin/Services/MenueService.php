<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class MenueService extends Controller
{
    /**
     * get category for show in the menu bar
     * with create cache
     *
     * @return mixed
     */
    public static function getMenuAndSetCache()
    {
        if (!Cache::has('data')) {

            $data = CategoryService::getMenue();
            Cache::add('data', $data);
        }
        $data = Cache::get('data', now()->addMonth());
        return $data;
    }
}
