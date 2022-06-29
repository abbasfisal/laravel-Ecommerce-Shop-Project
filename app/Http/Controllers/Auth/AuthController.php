<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\OTPService;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\OtpCheckRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();

        return Redirect::to(route('index'));
    }
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
            ->with('otp', config('shop.otp_succ') . $otp_code)
            ->withCookie($myTelCookie);
    }

    /**
     * Check OTP Code
     * @param OtpCheckRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function otpCheck(OtpCheckRequest $request)
    {
        $cnt = OTPService::isExists(
            self::getOtpFromRequest($request),
            Cookie::get('tel')
        );

        //set cookie
        $tel = cookie('tel', Cookie::get('tel'), 120);

        //otp was exist so redirect to set password
        if ($cnt->count()) {
            return
                redirect(route('get.password'))
                    ->with('tel', $request->tel)
                    ->withCookie($tel);
        }

        //otp wasnt exist so redirect back
        return redirect(route('show.otp'))
            ->with('msg', 'otp was wrong')
            ->withCookie($tel);

    }

    public function setPassword(SetPasswordRequest $request)
    {
        AuthService::setPassword($request);
        return redirect(route('index'));

    }

    /**
     * Login User By Tel and password
     *
     * @param LoginRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(LoginRequest $request)
    {

        $user = AuthService::getUserWhere($request);


        if ($user === false)
            return redirect('login')->with('fail', config('shop.msg.fail'));

        //admin login
        if ($user->type == User::admin_type) {
            Auth::login($user);
            return redirect(route('index.admin.dashboard'));
        }

        //user login
        if ($user->type == User::user_type) {
            Auth::login($user);
            return redirect(route('index'));
        }





    }
    /*
     |------------------------------
     | private Method
     |------------------------------
     |
     */

    /**
     * Mix OTP code together  which is come form otp.blade.php view
     *
     * @param Request $request
     * @return string
     */
    private static function getOtpFromRequest(\Illuminate\Http\Request $request)
    {
        return $request->first . $request->second . $request->third . $request->fourth;
    }
}
