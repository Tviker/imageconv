<?php


namespace App\Http\Helpers;


use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageOriginal extends ImageHandler
{

    public function handler(UploadedFile $file)
    {
        return Image::make($file);
    }

    public function getType(): string
    {
        return ImageConv::ORIGINAL;
    }
}
