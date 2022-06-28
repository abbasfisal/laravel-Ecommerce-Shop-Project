<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserServices extends Controller
{
    /**
     * get users table count
     *
     * @return int
     */
    public static function count()
    {
        return User::query()->count();
    }
}
