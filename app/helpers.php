<?php

use Illuminate\Support\Str;


if (!function_exists('SLUG')) {
    /**
     * generate slug
     * @param $text
     * @return string
     */
    function SLUG($text)
    {
        return Str::lower(Str::replace(' ', '-', $text));
    }
}

if (!function_exists('UNIQ')) {

    /**
     * create a unique text with given prefix
     */
    function UNIQ($prefix)
    {
        return uniqid($prefix . '-' . md5(now()) . '-');
    }
}


if (!function_exists('msg_succ')) {
    /**
     * return successfully created message
     */
    function msg_succ()
    {
        return config('shop.msg.create');
    }
}


if (!function_exists('NEW_OTP')) {
    /**
     * Generate 6 digit for OTP CODE
     */
    function NEW_OTP()
    {
        return rand(1111, 9999);
    }
}


if (!function_exists('DISCOUNT')) {
    /**
     * Calculate Discount
     */
    function DISCOUNT($actual_price, $percent)
    {
        return (int)($actual_price - ($actual_price * ($percent / 100)));
    }
}

