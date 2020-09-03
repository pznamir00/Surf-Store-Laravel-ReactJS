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
      return view('pages.cart');
    }


    public function add_to_cart(Request $request)
    {
      if(!request()->has('product_id') || !request()->has('size_id'))
        return redirect('/');

      if(Session::has('cart')){
        Session::get('cart')->add(request('product_id'), request('size_id'));
      }
      else{
        $cart = new Cart();
        $cart->add(request('product_id'), request('size_id'));
        Session::put('cart', $cart);
      }
      return redirect('/')->with('success', 'Product added to cart');
    }


    public function delete_from_cart(Request $request)
    {
      $key = $request->input('key');
      Session::get('cart')->remove($key);
      return redirect('/')->with('success', 'Removed item from cart');
    }


    public function clear()
    {
      Session::forget('cart');
      return redirect('/')->with('success', 'Cleart cart');
    }
}
