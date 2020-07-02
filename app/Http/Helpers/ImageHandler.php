<?php


namespace App\Http\Helpers;


use Illuminate\Http\UploadedFile;

abstract class ImageHandler
{
    public abstract function handler(UploadedFile $file);

    public abstract function getType(): string;
}
