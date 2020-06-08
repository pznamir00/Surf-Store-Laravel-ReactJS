<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Size;
use Session;

class CartController extends Controller
{

    public function index()
    {
      $cart = Session::get('cart');
      $products = array();

      foreach($cart->items as $i){
        array_push($products, [
          'product' => Product::find($i['product id']),
          'size' => Size::find($i['size id']),
          'qty' => $i['quantity'],
        ]);
      }

      return view('pages.cart', compact('products'));
    }



    public function add_to_cart()
    {
      if(!request()->has('product_id') || !request()->has('selected_size'))
        return redirect('/');

      if(Session::has('cart')){
        Session::get('cart')->add(request('product_id'), request('selected_size'));
      }
      else{
        //first item: set cart session variable
        $cart = new Cart(request('product_id'), request('selected_size'));
        Session::put('cart', $cart);
      }

      return redirect('/')->with('success', 'Product added to cart');
    }



    public function delete_from_cart($key)
    {
      Session::get('cart')->remove($key);
      return redirect('/')->with('success', 'Removed item from cart');
    }



    public function clear()
    {
      Session::forget('cart');
      return redirect('/')->with('success', 'Cleart cart');
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
