<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardService extends Controller
{
    /**
     * get statics information
     * @return array
     */
    public static function getInformation()
    {
       return  $data = [
            'Products' =>ProductService::count() ,
            'Users' =>UserServices::count(),
            'New Orders' => OrderService::newCount() ,
            'All Orders' => OrderService::allCount() ,
            'Main Categories' => CategoryService::MainCategoryCount()
        ];
    }
}
