<?php

namespace App\Http\Controllers\User\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileRequest;
use Illuminate\Support\Facades\Auth;

class UserService extends Controller
{
    //
    public static function updateProfile(UserProfileRequest $request)
    {
        return Auth::user()
                   ->update(['name' => $request->name]);
    }
}
