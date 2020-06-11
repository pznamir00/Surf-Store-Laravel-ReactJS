<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Payment;
use App\Delivery;
use App\Product;
use App\Size;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
      $data = [
        'first_name' => Auth::check() ? Auth::user()->first_name : "",
        'last_name' => Auth::check() ? Auth::user()->last_name : "",
        'email' => Auth::check() ? Auth::user()->email : "",
        'phone' => Auth::check() ? Auth::user()->phone : "",
        'street' => Auth::check() ? Auth::user()->street : "",
        'home_number' => Auth::check() ? Auth::user()->home_number : "",
        'city' => Auth::check() ? Auth::user()->city : "",
        'zipcode' => Auth::check() ? Auth::user()->zipcode : "",
      ];

      if(Session::has('order_data')){
        $data['first_name'] = Session::get('order_data')['first_name'];
        $data['last_name'] = Session::get('order_data')['last_name'];
        $data['email'] = Session::get('order_data')['email'];
        $data['phone'] = Session::get('order_data')['phone'];
        $data['street'] = Session::get('order_data')['street'];
        $data['home_number'] = Session::get('order_data')['home_number'];
        $data['city'] = Session::get('order_data')['city'];
        $data['zipcode'] = Session::get('order_data')['zipcode'];
      }

      return view('order.index', compact('data'));
    }

    public function save_data_form(Request $req)
    {
      $this->validate($req, [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|min:9',
        'street' => 'required',
        'home_number' => 'required',
        'city' => 'required',
        'zipcode' => 'required',
      ]);

      $data = $req->all();
      Session::put('order_data', $data);
      return redirect('order/delivery');
    }

    public function delivery(Request $request)
    {
      if($request->isMethod('post')){
        $this->validate($request, [
          'selected-delivery' => 'required',
        ]);
        Session::put('delivery_id', $request->input('selected-delivery'));
        return redirect('/order/payment');
      }

      $deliveries = Delivery::all();
      return view('order.delivery', compact('deliveries'));
    }

    public function payment(Request $request)
    {
      if($request->isMethod('post')){
        $this->validate($request, [
          'selected-payment' => 'required',
        ]);
        Session::put('payment_id', $request->input('selected-payment'));
        return redirect('/order/summary');
      }

      $selected = Session::has('payment_id') ? Session::get('payment_id') : null;
      $payments = Payment::all();
      return view('order.payment', compact('payments'));
    }

    public function summary()
    {
      if(!Session::has('payment_id') || !Session::has('delivery_id')){
        return redirect('cart');
      }

      $products = [];
      foreach(Session::get('cart')->items as $i){
        array_push($products, [
          'product' => Product::find($i['product id']),
          'size' => Size::find($i['size id']),
          'qty' => $i['quantity'],
        ]);
      }

      $payment = Payment::find( Session::get('payment_id') );
      $delivery = Delivery::find( Session::get('delivery_id') );
      $total = Session::get('cart')->count_total();
      return view('order.summary', compact('products', 'payment', 'delivery', 'total'));
    }

    public function make_order()
    {
      if(!Session::has('payment_id') || !Session::has('delivery_id')){
        return redirect('cart');
      }

      $cart = session('cart');
      $data_form = session('order_data');
      $del_id = session('delivery_id');
      $pay_id = session('payment_id');

      $new_order = Order::create([
        'first_name' => $data_form['first_name'],
        'last_name' => $data_form['last_name'],
        'email' => $data_form['email'],
        'phone' => $data_form['phone'],
        'street' => $data_form['street'],
        'home_numner' => $data_form['home_number'],
        'city' => $data_form['city'],
        'zipcode' => $data_form['zipcode'],
        'total' => $cart->count_total(),
        'payment_id' => $pay_id,
        'delivery_id' => $del_id
      ]);

      $new_order->create_ordered_products($cart->items);
      Session::forget('cart');
      Session::forget('payment_id');
      Session::forget('delivery_id');
      Session::forget('order_data');
      return redirect('/')->with('success', 'Ordered succesfully');
    }
}
