<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\CityService;
use App\Http\Controllers\Admin\Services\StateService;
use App\Http\Controllers\Controller;
use App\Http\Requests\getStateRequest;
use App\Http\Requests\storeStateRequest;

class StateController extends Controller
{
    /**
     * get all city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAllCity()
    {

        $cities = CityService::getAll();
        return view('admin.cities.allstate' , compact('cities'));
    }

    /**
     * store new state to db
     *
     * @param storeStateRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(storeStateRequest $request)
    {
        StateService::create($request);
        return redirect(route('index.city'))->with('success-state', msg_succ());
    }

    /**
     * get states by city id
     * @param getStateRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getByCityId(getStateRequest $request)
    {
        $cities = CityService::getAll();
        $states = StateService::getStateByCityId(CityService::getById($request->get_city_id));

        return view('admin.cities.allstate', compact('states','cities'));
    }
}
