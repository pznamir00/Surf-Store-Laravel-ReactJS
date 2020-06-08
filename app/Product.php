<?php

namespace App;
use App\Size;
use App\Image;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function sizes()
    {
      return $this->hasMany('App\Size');
    }

    public function images()
    {
      return $this->hasMany('App\Image');
    }

    public function create_sizes($values, $quantities)
    {
      foreach($values as $key=>$val){
        $size = new Size();
        $size->value = $val;
        $size->quantity = $quantities[$key];
        $size->product_id = $this->id;
        $size->save();
      }
    }

    public function delete_sizes()
    {
      $sizes = $this->sizes;
      foreach($sizes as $size){
        $size->delete();
      }
    }

    public function set_new_added_images()
    {
      $images = Image::all()->where('product_id', '0');
      foreach($images as $img){
        $img->product_id = $this->id;
        $img->save();
      }
    }

    public function delete_removed_images($removeds)
    {
      if($removeds){
        foreach($removeds as $rem){
          $image = Image::where('url', '=', $rem)->first();
          unlink(public_path('images').'/'.$image->url);
          $image->delete();
        }
      }
    }

    public function clear_sizes()
    {
      $sizes = $this->sizes;
      foreach($sizes as $size){
        $size->delete();
      }
    }

    public function clear_images()
    {
      $images = $this->images;
      foreach($images as $img){
        unlink(public_path('images').'/'.$img->url);
        $img->delete();
      }
    }
}
