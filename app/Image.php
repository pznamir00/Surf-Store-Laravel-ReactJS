<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Image extends Model
{
  private const FILE_PATH = 'media/products';

  public function upload($file){
    $this->url = microtime(true).'.'.$file->getClientOriginalExtension();
    $file->move(public_path(Image::FILE_PATH), $this->url);
  }

  public static function boot() {
    parent::boot();
    static::deleting(function($img) {
      File::delete(Image::FILE_PATH.'/'.$img->url);
    });
  }
}
