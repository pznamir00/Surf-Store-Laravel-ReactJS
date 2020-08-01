<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class DataAjaxController extends Controller
{
    public function get_categories()
    {
        $data = Category::with('subcategories')->get();
        return response()->json($data);
    }


    public function change_size(Request $req)
    {
      $data = $req->all();
      foreach(Session::get('cart')->items as $key=>$item){
        if($item['size id'] == $data['sizeId']){
          Session::get('cart')->items[$key]['quantity'] = $data['quantity'];
        }
      }
      return response()->json('success');
    }
}
