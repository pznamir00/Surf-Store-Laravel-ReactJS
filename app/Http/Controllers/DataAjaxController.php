<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use App\Category;
use App\SubCategory;
use Session;

class DataAjaxController extends Controller
{
    public function get_categories()
    {
        $data = Category::with('subcategories')->get();
        return response()->json($data);
    }


    public function get_sizes($id)
    {
      try{
          $subcategory = SubCategory::find($id);
          $data = $subcategory->sizes;
          return response()->json($data);
      }
      catch(QueryException $e){
        return response()->json([]);
      }
    }


    public function change_size(Request $request)
    {
      foreach(session('cart')->items as $key=>$item)
      {
        if($item['size']->id == $request->sizeId)
        {
          if($item['size']->quantity > $request->quantity)
            $new_quantity = $request->quantity;
          else
            $new_quantity = $item['size']->quantity;

          if($request->quantity < 1)
            $new_quantity = 1;

          session('cart')->items[$key]['quantity'] = $new_quantity;
          session('cart')->count_total();
        }
      }
      return response()->json('success');
    }
}
