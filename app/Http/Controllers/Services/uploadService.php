<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;

class uploadService extends Controller
{
    public static function handle(UploadedFile $file, $path, $perfix)
    {
        $imageName = UNIQ($perfix) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $imageName);

        return $imageName;
    }
}
