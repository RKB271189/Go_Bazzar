<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Exception;

trait FileStorage
{
    /**
     * Storing image
     * @return bool
     */
    public function StoreImage(string $folder, string $fileName, $image): bool
    {
        try {
            $path = $folder . '/' . $fileName;
            $img = Image::make($image);
            // $img->resize(500, 250);
            $img->stream();
            $isstored = Storage::disk('public')->put($path, $img);
            return $isstored;
        } catch (Exception $ex) {
            return false;
        }
    }
}
