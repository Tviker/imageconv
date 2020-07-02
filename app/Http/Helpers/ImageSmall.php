<?php


namespace App\Http\Helpers;


use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageSmall extends ImageHandler
{
    const SIZE = 256;

    public function handler(UploadedFile $file)
    {
        return Image::make($file)
            ->resize(ImageSmall::SIZE, ImageSmall::SIZE);
    }

    public function getType(): string
    {
        return ImageConv::SMALL;
    }
}
