<?php


namespace App\Helpers;


use Illuminate\Http\UploadedFile;
use Intervention\Image\Image;

abstract class ImageHandler
{
    /**
     * Handle image and do something
     * @param UploadedFile $file
     * @return Image
     */
    public abstract function handler(UploadedFile $file);

    public abstract function getType(): string;
}
