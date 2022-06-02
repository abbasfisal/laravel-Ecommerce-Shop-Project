<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index()
    {
        return view('admin.cities.index');
    }
}
