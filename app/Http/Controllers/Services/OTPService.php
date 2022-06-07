<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\OTPCode;

class OTPService extends Controller
{
    /**
     * get OTPCode By Tel
     * @param $tel
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public static function getByTel($tel)
    {
        return OTPCode::query()
                      ->where('tel', $tel)
                      ->first();
    }

    /**
     * create new otp code
     * @param $tel
     * @param $code
     * @return mixed
     */
    public static function create($tel, $code)
    {
        return OTPCode::create([
            'tel'  => $tel,
            'code' => $code
        ]);
    }

    public static function updateNewCode(?\Illuminate\Database\Eloquent\Model $otp)
    {
        $otp->update(['code' => NEW_OTP()]);
        return $otp->code;
    }


}
