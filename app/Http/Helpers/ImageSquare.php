<?php


namespace App\Http\Helpers;


use App\ImageResult;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageSquare extends ImageHandler
{

    /**
     * Make square image add white to space, doesn't crop
     * @param UploadedFile $file
     * @return \Intervention\Image\Image
     */
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
        return ImageResult::SQUARE;
    }
}
