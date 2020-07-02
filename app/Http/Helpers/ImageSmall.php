<?php


namespace App\Http\Helpers;


use App\ImageResult;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageSmall extends ImageHandler
{
    const SIZE = 256;

    /**
     * Handler image, resize to 256px
     * @param UploadedFile $file
     * @return \Intervention\Image\Image
     */
    public function handler(UploadedFile $file)
    {
        return Image::make($file)
            ->resize(ImageSmall::SIZE, ImageSmall::SIZE);
    }

    public function getType(): string
    {
        return ImageResult::SMALL;
    }
}
