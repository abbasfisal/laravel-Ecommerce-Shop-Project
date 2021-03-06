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

    /**
     * Delete a Image
     * @param $ImageName
     * @param $ImagePath
     */
    public static function RemoveImage($ImageName, $ImagePath)
    {
        if (file_exists($ImagePath . $ImageName)) {
            unlink($ImagePath . $ImageName);
        }

    }

    /**
     * Remove coolections of Images
     * @param \Illuminate\Database\Eloquent\Collection $productGalleries
     * @param $ImagePath
     */
    public static function removeImages(\Illuminate\Database\Eloquent\Collection $productGalleries, $ImagePath)
    {
        foreach ($productGalleries as $productGallery) {
            uploadService::RemoveImage($productGallery->image, $ImagePath);
        }
    }


}
