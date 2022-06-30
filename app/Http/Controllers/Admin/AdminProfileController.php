<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Services\ProfileService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;

class AdminProfileController extends Controller
{
    public function showProfile()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(AdminProfileRequest $request)
    {
        $update_reuslt = ProfileService::update($request);

        if($update_reuslt)
            return redirect()->back()->with('succ' , config('shop.msg.update'));

        return redirect()->back()->with('fail' , config('shop.msg.fail_update'));

    }
}
