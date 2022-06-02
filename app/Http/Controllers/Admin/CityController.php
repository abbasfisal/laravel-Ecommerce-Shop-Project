<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\CityService;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeCityRequest;

class CityController extends Controller
{
    public function index()
    {
        $cities = CityService::getAll();
        return view('admin.cities.index',compact('cities'));
    }

    public function store(storeCityRequest $request)
    {
        CityService::createCity($request);
        return redirect(route('index.city'))->with('success', msg_succ());
    }
}
