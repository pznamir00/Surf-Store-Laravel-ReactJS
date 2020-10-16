<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use App\Category;
use App\SubCategory;
use App\Color;
use App\Producent;
use Session;


class ApiController extends Controller
{
    private const SORT_WAYS = [
      'created_at'      => 'As newest',
      'created at DESC' => 'As oldest',
      'price'           => 'As lowest price',
      'price DESC'      => 'As highest price',
      'title'           => 'A - Z',
      'title DESC'      => 'Z - A',
    ];


    public function get_categories()
    {
        $data = Category::with('subcategories')->get();
        return response()->json($data, 200);
    }


    public function get_sizes($subcat_id)
    {
        $subcategory = SubCategory::findOrFail($subcat_id);
        $data = $subcategory->sizes;
        return response()->json($data, 200);
    }


    public function get_catalog_filenames()
    {
      $data = array();
      $handle = opendir(public_path('/media/catalog'));
      while(($file = readdir($handle)) !== FALSE){
        $data[] = $file;
      }
      closedir($handle);
      return response()->json($data, 200);
    }


    public function change_size_quantity(Request $request)
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

      return response()->json('success', 200);
    }


    public function get_colors()
    {
      $data = Color::all();
      return response()->json($data, 200);
    }


    public function get_producents()
    {
      $data = Producent::all();
      return response()->json($data, 200);
    }


    public function get_sorts()
    {
      $data = ApiController::SORT_WAYS;
      return response()->json($data, 200);
    }


    public function get_all_sizes()
    {
      $data = Size::all();
      return response()->json($data, 200);
    }
}
