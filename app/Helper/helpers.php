<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

function processCurrentUrl()
{
    $url = str_replace(route('admin.show.dashboard'), 'home', url()->current());
    $url = str_replace(array(':', '-'), ' ', $url);
    return explode('/', $url);
}

function uploadImage($file, $folder) {
    try {
        $baseFolder = 'uploads/images /';
        $path = $folder . '/';
        if (!file_exists($baseFolder . $path)) {
            File::makeDirectory(public_path($baseFolder . $path), 0777, true, true);
        }
        $filename = Str::random(10) . '-' . round(microtime(true)) . '.webp';
        Image::make($file)->encode('webp')->save($baseFolder . $path . $filename);
        return $baseFolder . $path . $filename;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
