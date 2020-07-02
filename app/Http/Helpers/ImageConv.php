<?php

namespace App\Http\Helpers;

use App\ImageResult;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

class ImageConv
{
    const ORIGINAL = 'original';
    const SMALL = 'small';
    const SQUARE = 'square';
    const ALL = 'all';
    private $imageOriginal;
    private $imageSmall;
    private $imageSquare;
    private $saveHelper;

    /**
     * ImageConv constructor.
     * @param ImageSmall $imageSmall
     * @param ImageOriginal $imageOriginal
     * @param ImageSquare $imageSquare
     * @param ImageSaveHelper $imageSave
     */
    public function __construct(ImageSmall $imageSmall, ImageOriginal $imageOriginal, ImageSquare $imageSquare,
                                ImageSaveHelper $imageSave)
    {
        $this->imageOriginal = $imageOriginal;
        $this->imageSmall = $imageSmall;
        $this->imageSquare = $imageSquare;
        $this->saveHelper = $imageSave;
    }

    /**
     * Get handlers and process image
     * @param UploadedFile $photo
     * @param string $output
     * @return false|string
     */
    public function converting(UploadedFile $photo, string $output)
    {
        $hash = sha1_file($photo->path());
        foreach ($this->getImageHandler($output) as $imageConvector) {
            $result = $imageConvector->handler($photo);
            $this->saveHelper->saveImage($result, $photo->getClientOriginalName(), $hash, $imageConvector->getType());
        }
        return $hash;
    }

    public function getImageHandler($output)
    {
        switch ($output) {
            case ImageResult::ORIGINAL:
                return [$this->imageOriginal];
            case ImageResult::SMALL:
                return [$this->imageSmall];
            case ImageResult::SQUARE:
                return [$this->imageSquare];
            case ImageConv::ALL:
                return [$this->imageOriginal, $this->imageSmall, $this->imageSquare];
        }
        return [$this->imageOriginal];
    }
}
