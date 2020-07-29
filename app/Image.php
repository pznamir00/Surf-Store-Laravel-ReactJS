<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Image extends Model
{
  public function upload($file){
    $this->url = microtime(true).'.'.$file->getClientOriginalExtension();
    $file->move(public_path('images'), $this->url);
  }

  public static function boot() {
    parent::boot();
    static::deleting(function($img) {
      File::delete('images/'.$img->url);
    });
  }
}
