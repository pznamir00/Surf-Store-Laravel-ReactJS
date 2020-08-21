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

class PageController extends Controller
{
    private const PAGINATION = 20;
    private const SORT_WAYS = [
      'created_at'      => 'As newest',
      'created at DESC' => 'As oldest',
      'price'           => 'As lowest price',
      'price DESC'      => 'As highest price',
      'title'           => 'A - Z',
      'title DESC'      => 'Z - A',
    ];


    private static function filter($products)
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


    public function index()
    {
        $products = Product::where('active', '1')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(PageController::PAGINATION);
        $categories = Category::all();
        return view('pages.index', compact('products', 'categories'));
    }


    public function one_product($id)
    {
        try{
          $product = Product::find($id);
          return view('pages.one_product', compact('product'));
        }
        catch(QueryException $e){
          return redirect('/')->withErrors('Product not found');
        }
    }


    public function categories($cat, $subcat)
    {
          $title = 'Category > '.$cat.' > '.$subcat;
          $subcategory = SubCategory::where('slug', $subcat)->first();
          $categories = Category::all();
          $colors = Color::all();
          $producents = Producent::all();
          $sizes = $subcategory->sizes;
          $sorts = PageController::SORT_WAYS;
          $biggest_price = Product::max('price') ? Product::max('price') : 0;
          $price = [
            'as' => request()->has('price_as') && request('price_as') != '' ? request('price_as') : 0,
            'to' => request()->has('price_to') && request('price_to') != '' ? request('price_to') : $biggest_price,
          ];
          $order_by_keys = request()->has('order_by') ?
            strpos(request('order_by'), ' ') ? explode(" ", request('order_by')) : [request('order_by'), 'ASC'] :
            ['created_at', 'ASC'];

          $products = Product::where('active', 1)
                      ->where('sub_category_id', $subcategory->id)
                      ->where('price', '>=', $price['as'])
                      ->where('price', '<=', $price['to'])
                      ->orderBy($order_by_keys[0], $order_by_keys[1])
                      ->paginate(PageController::PAGINATION);

          PageController::filter($products);
          return view('pages.products_list', compact('title', 'products', 'categories', 'sizes', 'sorts', 'colors', 'producents', 'price', 'biggest_price'));
    }


    public function keywords()
    {
        if(!request()->has('keywords') || request('keywords') == '')
          return redirect('/');

        $keywords = request('keywords');
        $title = 'Keywords: '.$keywords;
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();
        $producents = Producent::all();
        $sorts = PageController::SORT_WAYS;
        $biggest_price = Product::max('price') ? Product::max('price') : 0;
        $price = [
          'as' => request()->has('price_as') && request('price_as') != '' ? request('price_as') : 0,
          'to' => request()->has('price_to') && request('price_to') != '' ? request('price_to') : $biggest_price,
        ];
        $order_by_keys = request()->has('order_by') ?
          strpos(request('order_by'), ' ') ? explode(" ", request('order_by')) : [request('order_by'), 'ASC'] :
          ['created_at', 'ASC'];

        $products = Product::where('active', 1)
                    ->where('price', '>=', $price['as'])
                    ->where('price', '<=', $price['to'])
                    ->where(function($query) use ($keywords){
                      return $query->where('title', 'like', '%'.$keywords.'%')
                                  ->orWhere('description', 'like', '%'.$keywords.'%');
                    })
                    ->orderBy($order_by_keys[0], $order_by_keys[1])
                    ->paginate(PageController::PAGINATION);

        PageController::filter($products);
        return view('pages.products_list', compact('title', 'products', 'categories', 'sizes', 'sorts', 'colors', 'producents', 'price', 'biggest_price'));
    }
}
