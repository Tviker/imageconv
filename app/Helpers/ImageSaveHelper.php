<?php


namespace App\Helpers;


use App\ImageResult;
use Illuminate\Support\Str;
use Intervention\Image\Image;

class ImageSaveHelper
{
    private const PATH_TO_SAVE = 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;

    /**
     * Save image to local storage
     * @param Image $imageFile
     * @param string $name
     * @param string $hash
     * @param string $type
     */
    public function saveImage(Image $imageFile, string $name, string $hash, string $type)
    {
        $base_64 = base64_encode($name);
        $file_name = time() . Str::random(5) . $name;
        $path = storage_path(ImageSaveHelper::PATH_TO_SAVE) . $file_name;
        $path_image = 'storage' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $file_name;
        $hash_image = $hash;
        $imageFile->save($path);
        $img = ImageResult::where(['hash_image' => $hash_image, 'type' => $type])->first();
        $attribute = compact('hash_image', 'base_64', 'path_image', 'type');
        $this->saveToDb($img, $attribute);
    }

    /**
     * Save result to database
     * @param ImageResult $img
     * @param array $attribute
     */
    private function saveToDb(?ImageResult $img, array $attribute)
    {
        if (isset($img) || empty($img)) {
            ImageResult::create($attribute);
        } else {
            $img->update($attribute);
        }
    }
}
