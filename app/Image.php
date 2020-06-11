<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Image extends Model
{

  public function upload($file)
  {
    $filename = microtime(true).'.'.$file->getClientOriginalExtension();
    $file->move(public_path('images'), $filename);
    $this->url = $filename;
  }

  public function del_file()
  {
    File::delete('images/'.$this->url);
  }
}
