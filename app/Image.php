<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Image extends Model
{
  public function del_file()
  {
    File::delete('images/'.$this->url);
  }
}
