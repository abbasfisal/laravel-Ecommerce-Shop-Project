<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateService extends Controller
{
    /**
     * store new state in to db
     * @param \App\Http\Requests\storeStateRequest $request
     */
    public static function create(Request $request)
    {
        return State::create(['city_id' => $request->city_id, 'name' => $request->state]);
    }
}
