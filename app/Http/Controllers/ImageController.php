<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;


class ImageController extends Controller
{
    public function create_single_image(Request $request)
    {
      $image = new Image;
      $image->upload($request->file('file'));
      $image->save();
      return response()->json([], 201);
    }

    public function set_new_added_images($id)
    {
      $images = Image::all()->whereNull('product_id');
      foreach($images as $img){
        $img->product_id = $id;
        $img->save();
      }
    }

    public function delete_removed_images($removed)
    {
      if($removed)
        foreach($removed as $img)
          Image::where('url', $img)->first()->delete();
    }
}
