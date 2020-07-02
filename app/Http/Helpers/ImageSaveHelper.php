<?php


namespace App\Http\Helpers;


use App\ImageResult;
use Illuminate\Support\Str;
use Intervention\Image\Image;

class ImageSaveHelper
{
    private const PATH_TO_SAVE = 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;

    public function saveImage(Image $image, $name, $hash, $type)
    {
        $base_64 = base64_encode($name);
        $file_name = time() . Str::random(5) . $name;
        $path = storage_path(ImageSaveHelper::PATH_TO_SAVE) . $file_name;
        $path_image = 'storage' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $file_name;
        $hash_image = $hash;
        $image->save($path);
        $img = ImageResult::where(['hash_image' => $hash_image, 'type' => $type])->first();
        $attribute = compact('hash_image', 'base_64', 'path_image', 'type');
        if (empty($img)) {
            ImageResult::create($attribute);
        } else {
            $img->update($attribute);
        }
    }
}
