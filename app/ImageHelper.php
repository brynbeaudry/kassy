<?php

namespace App;

use Intervention\Image\Facades\Image;

class ImageHelper
{
    public function process_image(& $image_array){
      $rnd_str = str_random(20);
      $tmp_path = "tmp/$rnd_str." . "png";
      $tmp_url = public_path($tmp_path);
      $local = Image::make($image_array['img'])
      /* resize only the height of the canvas */
      ->resizeCanvas(1080, 1080)
      /*resize the image to a height of 1080, constrain spect ration */
      ->resize(null,1080, function ($constraint) {
              $constraint->upsize();
              $constraint->aspectRatio();
      })
      ->save($tmp_url);
      if(Image::make($tmp_url)->exif() !== null)
        $local =  Image::make($tmp_url)->orientate()->save();
      $image_array['img'] = (string) $local->encode('data-url', 100);
      $thumb_canvas = Image::canvas(150, 150, '#ffffff');
      $thumb = Image::make($local)->resize(150, 150, function ($c) {
        $c->aspectRatio();
        $c->upsize();
      })->save($tmp_url);
      $image_array['thumb'] = (string) $thumb->encode('data-url', 100);
      if(file_exists($tmp_url)){
          unlink($tmp_url);
          echo "<img src='$fullsize_img' />";
          echo "<img src='$img' />";
          echo "<img src='$thumb' />";
      }else{
          echo 'file not found';
          throw new Exception("Error Processing Image, check tmp", 1);
      }
    }
}
