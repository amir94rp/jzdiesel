<?php


namespace App\CustomClasses;
use Intervention\Image\Facades\Image;

class interventionImages
{
    public function store($file,$name,$largeImageWidth,$mediumImageWidth,$smallImageWidth){

        $original_images_storage = public_path('images/');
        $large_images_storage = public_path('large-screen-images/');
        $medium_images_storage = public_path('medium-screen-images/');
        $small_images_storage = public_path('small-screen-images/');
        $tiny_images_storage = public_path('tiny-images/');

        $interventionImage = Image::make($file->getRealPath());
        $interventionImage->save($original_images_storage.$name,100);
        $interventionImage = Image::make($file->getRealPath());
        $interventionImage->resize($largeImageWidth, null, function ($constraint) {$constraint->aspectRatio();})->save($large_images_storage.$name,100);
        $interventionImage = Image::make($file->getRealPath());
        $interventionImage->resize($mediumImageWidth, null, function ($constraint) {$constraint->aspectRatio();})->save($medium_images_storage.$name,100);
        $interventionImage = Image::make($file->getRealPath());
        $interventionImage->resize($smallImageWidth, null, function ($constraint) {$constraint->aspectRatio();})->save($small_images_storage.$name,100);
        $interventionImage = Image::make($file->getRealPath());
        $interventionImage->resize(10, null, function ($constraint) {$constraint->aspectRatio();})->blur(1)->save($tiny_images_storage.$name,85);

        return;
    }

    public function delete($image){

        $original_images_storage = public_path('images/');
        $large_images_storage = public_path('large-screen-images/');
        $medium_images_storage = public_path('medium-screen-images/');
        $small_images_storage = public_path('small-screen-images/');
        $tiny_images_storage = public_path('tiny-images/');

        if (file_exists($original_images_storage.$image->getOriginal('path'))){unlink($original_images_storage.$image->getOriginal('path'));}
        if (file_exists($large_images_storage.$image->getOriginal('path'))){unlink($large_images_storage.$image->getOriginal('path'));}
        if (file_exists($medium_images_storage.$image->getOriginal('path'))){unlink($medium_images_storage.$image->getOriginal('path'));}
        if (file_exists($small_images_storage.$image->getOriginal('path'))){unlink($small_images_storage.$image->getOriginal('path'));}
        if (file_exists($tiny_images_storage.$image->getOriginal('path'))){unlink($tiny_images_storage.$image->getOriginal('path'));}

        return;
    }
}
