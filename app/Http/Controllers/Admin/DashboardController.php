<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\DashboardService;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        $data = DashboardService::getInformation();

        return view('admin.dashboard.index',
            compact(
                'data'
            )
        );

    }
}
