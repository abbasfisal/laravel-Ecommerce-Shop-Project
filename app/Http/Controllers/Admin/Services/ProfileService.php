<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileService extends Controller
{
    //
    public static function update(AdminProfileRequest $request)
    {
        return Auth::user()
                   ->update(['name' => $request->name]);

    }
}
