<?php


namespace App\Helpers;


use App\ImageResult;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageOriginal extends ImageHandler
{

    /**
     * Return origin image
     * @param UploadedFile $file
     * @return \Intervention\Image\Image
     */
    public function handler(UploadedFile $file)
    {
        return Image::make($file);
    }

    public function getType(): string
    {
        return ImageResult::ORIGINAL;
    }
}
