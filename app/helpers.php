<?php

use Illuminate\Support\Str;

if (!function_exists('SLUG')) {
    function SLUG($text)
    {
        return Str::lower(Str::replace(' ', '-', $text));
    }
}

/**
 * create a unique text with given prefix
 */
if (!function_exists('UNIQ')) {
    function UNIQ($prefix)
    {
        return uniqid($prefix . '-' . md5(now()) . '-');
    }
}

/**
 * return successfully created message
 */
if (!function_exists('msg_succ')) {
    function msg_succ()
    {
        return config('shop.msg.create');
    }
}
