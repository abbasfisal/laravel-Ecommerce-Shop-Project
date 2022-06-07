<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\OtpCheckRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SetPasswordRequest;
use App\Models\OTPCode;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    /**
     * register a new user
     */
    public function register(RegisterRequest $request)
    {
        $otp_code = AuthService::register($request);

        if ($otp_code == false)
            return redirect(route('show.register'))
                ->with('msg', config('shop.otp_wait'));

        //set cookie and send
        $myTelCookie = cookie('tel', $request->tel, 400);

        return redirect(route('show.otp'))
            ->with('otp' , config('shop.otp_succ') . $otp_code)
            ->withCookie($myTelCookie);
    }


    public function otpCheck(OtpCheckRequest $request)
    {
        $otpcode = $request->first . $request->second . $request->third . $request->fourth;

        //get coockie tel

        $cnt = OTPCode::query()
                      ->where('tel', '=', Cookie::get('tel'))
                      ->where('code', '=', $otpcode)
                      ->get();

        $tel = cookie('tel', Cookie::get('tel'), 120);

        if ($cnt->count()) {
            return redirect(route('get.password'))->with('tel', $request->tel)->withCookie($tel);
        }



        return redirect(route('show.otp'))
            ->with( 'msg', 'otp was wrong')
            ->withCookie($tel);

    }

    public function setPassword(SetPasswordRequest $request)
    {
        AuthService::setPassword($request);
        return redirect(route('index'));

    }
}
