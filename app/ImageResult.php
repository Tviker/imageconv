<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageResult extends Model
{
    const SMALL = 'small';
    const ORIGINAL = 'original';
    const SQUARE = 'square';
    protected $fillable = ['base_64', 'type', 'hash_image', 'path_image'];
    public $timestamps = false;
}
