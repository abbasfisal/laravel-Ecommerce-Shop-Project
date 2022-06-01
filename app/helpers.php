<?php

use Illuminate\Support\Str;

if (!function_exists('SLUG')) {
    function SLUG($text)
    {
        return Str::lower(Str::replace(' ', '-', $text));
    }
}
