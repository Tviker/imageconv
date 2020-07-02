<?php


namespace App\Http\Helpers;


use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageSquare extends ImageHandler
{

    public function handler(UploadedFile $file)
    {
        $image = Image::make($file);
        $sizeSquare = $image->getHeight() > $image->getWidth() ? $image->getHeight() : $image->getWidth();
        $result = Image::canvas($sizeSquare, $sizeSquare, '#ffffff');
        $result->insert($image);
        return $result;
    }

    public function getType(): string
    {
        return ImageConv::SQUARE;
    }
}
