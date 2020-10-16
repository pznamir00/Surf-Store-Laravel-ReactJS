<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Database\QueryException;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Size;
use App\Color;
use App\Producent;



class FilterController extends Controller
{
  private const PAGINATION = 20;


  private static function get_data_from_url()
  {
    $biggest_price = Product::max('price') ? Product::max('price') : 0;
    $price = [
      'as' => request()->has('price_as') && request('price_as') != '' ? request('price_as') : 0,
      'to' => request()->has('price_to') && request('price_to') != '' ? request('price_to') : $biggest_price,
    ];
    $order_by_keys = request()->has('order_by') ? strpos(request('order_by'), ' ') ? explode(" ", request('order_by')) : [request('order_by'), 'ASC'] : ['created_at', 'ASC'];

    return array(
      "biggest_price" => $biggest_price,
      "price" => $price,
      "order_by_keys" => $order_by_keys
    );
  }



  private static function filter_queries_results($products)
  {
    if(request()->has('size') && request('size') != 'All'){
        $products->each(function($product, $key) use ($products){
          foreach($product->sizes as $size){
            if($size->size->value == request('size')){
              return;
            }
          }
          $products->forget($key);
        });
    }

    if(request()->has('color') && request('color') != 'All'){
        $products->each(function($product, $key) use ($products){
          if($product->color->name == request('color'))
            $products->forget($key);
        });
    }

    if(request()->has('producent') && request('producent') != 'All'){
        $products->each(function($product, $key) use ($products){
          if($product->producent->name != request('producent'))
            $products->forget($key);
        });
      }
  }



  public function categories($cat, $subcat)
  {
        $title = 'Category > '.$cat.' > '.$subcat;
        $subcategory = SubCategory::where('slug', $subcat)->first();
        $url_data = FilterController::get_data_from_url();
        $products = Product::where('active', 1)
                    ->where('sub_category_id', $subcategory->id)
                    ->where('price', '>=', $url_data['price']['as'])
                    ->where('price', '<=', $url_data['price']['to'])
                    ->orderBy($url_data['order_by_keys'][0], $url_data['order_by_keys'][1])
                    ->paginate(FilterController::PAGINATION);

        FilterController::filter_queries_results($products);
        return view('pages.products_list', compact('title', 'products', 'subcategory'));
  }



  public function keywords()
  {
      if(!request()->has('keywords') || request('keywords') == '')
        return redirect('/');

      $keywords = request('keywords');
      $title = 'Keywords: '.$keywords;
      $url_data = FilterController::get_data_from_url();
      $products = Product::where('active', 1)
                  ->where(function($query) use ($keywords){
                    return $query->where('title', 'like', '%'.$keywords.'%')
                                ->orWhere('description', 'like', '%'.$keywords.'%');
                  })
                  ->where('price', '>=', $url_data['price']['as'])
                  ->where('price', '<=', $url_data['price']['to'])
                  ->orderBy($url_data['order_by_keys'][0], $url_data['order_by_keys'][1])
                  ->paginate(FilterController::PAGINATION);

      FilterController::filter_queries_results($products);
      return view('pages.products_list', compact('title', 'products'));
  }
}
