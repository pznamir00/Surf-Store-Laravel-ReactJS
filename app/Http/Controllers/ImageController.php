<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function upload(Request $req)
    {
      $picture = $req->file('file');
      $picture_name = microtime(true).'.'.$picture->getClientOriginalExtension();
      $picture->move(public_path('images'), $picture_name);

      $image = new Image();
      $image->url = $picture_name;
      $image->product_id = 0;
      $image->save();
    }
}
