<?php

namespace App\Http\Controllers\Auth\Services;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\OTPService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService extends Controller
{
    /**
     * Create New Or Regenerate Otp Code
     * @param Request $request
     * @return false|mixed
     */
    public static function register(Request $request)
    {

        $otp = OTPService::getByTel($request->tel);

        if (empty($otp)) {
            $otp_code = OTPService::create($request->tel, NEW_OTP());
            return $otp_code->code;
        }


        if ($otp->count() && $otp->updated_at->diffInSeconds() <= config('shop.otp_sec')) {
            return false;

        } elseif ($otp->count()) {
            //otp more than 2 minute was created
            return OTPService::updateNewCode($otp);
        }

    }

    /**
     * save password to db
     * @param Request $request
     */
    public static function setPassword(Request $request)
    {
        $user = User::query()
                    ->create([
                        'tel'      => $request->tel,
                        'valid'    => true,
                        'type'     => User::user_type,
                        'password' => Hash::make($request->password),
                    ]);

        Auth::login($user);

    }

    /**
     * if find a user by tel and password then login this user
     *
     * @param Request $request
     * @return bool
     */
    public static function getUserWhere(Request $request)
    {

        $user = User::query()
                    ->where('tel', $request->username)
                    ->get();

        if ($user->count()) {

            if (Hash::check($request->password, $user[0]->password)) {
                Auth::loginUsingId($user[0]->id);
                return true;
            }
        }
        return false;
    }
    /*
     |------------------------------
     | Private Method
     |------------------------------
     /*

    /**
     * return true
     * if OTP exist and its updated_time
     * Must be Under 2 Minute
     *
     * @param $otp
     * @return bool
     */
    /*private static function isExistAndNotExpireCode($otp): bool
    {
        return ($otp->count() && $otp->updated_at->diffInSeconds() <= config('shop.otp_sec')?);
    }*/
}
