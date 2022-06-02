<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\StateService;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeStateRequest;

class StateController extends Controller
{
    public function store(storeStateRequest $request)
    {
        StateService::create($request);
        return redirect(route('index.city'))->with('success-state', msg_succ());
    }
}
