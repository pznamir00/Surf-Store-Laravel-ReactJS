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
        'first_name'  => Session::has('order_data') ? Session::get('order_data')['first_name']  : (Auth::check() ? Auth::user()->first_name   : ""),
        'last_name'   => Session::has('order_data') ? Session::get('order_data')['last_name']   : (Auth::check() ? Auth::user()->last_name    : ""),
        'email'       => Session::has('order_data') ? Session::get('order_data')['email']       : (Auth::check() ? Auth::user()->email        : ""),
        'phone'       => Session::has('order_data') ? Session::get('order_data')['phone']       : (Auth::check() ? Auth::user()->phone        : ""),
        'street'      => Session::has('order_data') ? Session::get('order_data')['street']      : (Auth::check() ? Auth::user()->street       : ""),
        'home_number' => Session::has('order_data') ? Session::get('order_data')['home_number'] : (Auth::check() ? Auth::user()->home_number  : ""),
        'city'        => Session::has('order_data') ? Session::get('order_data')['city']        : (Auth::check() ? Auth::user()->city         : ""),
        'zipcode'     => Session::has('order_data') ? Session::get('order_data')['zipcode']     : (Auth::check() ? Auth::user()->zipcode      : ""),
      ];
      return view('order.index', compact('data'));
    }

    public function save_data_form(Request $request)
    {
      $this->validate($request, [
        'first_name'  => 'required',
        'last_name'   => 'required',
        'email'       => 'required|email',
        'phone'       => 'required|min:9',
        'street'      => 'required',
        'home_number' => 'required',
        'city'        => 'required',
        'zipcode'     => 'required',
      ]);
      Session::put('order_data', $request->all());
      return redirect('/order/delivery', 304);
    }

    public function delivery(Request $request)
    {
      if($request->isMethod('post')){
        $this->validate($request, ['selected-delivery' => 'required']);
        Session::put('delivery_id', $request->input('selected-delivery'));
        return redirect('/order/payment', 304);
      }
      $deliveries = Delivery::all();
      return view('order.delivery', compact('deliveries'));
    }

    public function payment(Request $request)
    {
      if($request->isMethod('post')){
        $this->validate($request, ['selected-payment' => 'required']);
        Session::put('payment_id', $request->input('selected-payment'));
        return redirect('/order/summary', 304);
      }
      $payments = Payment::all();
      return view('order.payment', compact('payments'));
    }

    public function summary()
    {
      if(!Session::has('payment_id') || !Session::has('delivery_id'))
        return redirect('cart', 307);

      $products = session('cart')->items;
      $payment = Payment::find(Session::get('payment_id'));
      $delivery = Delivery::find(Session::get('delivery_id'));
      $total = session('cart')->total + Delivery::find(session('delivery_id'))->price;
      return view('order.summary', compact('products', 'payment', 'delivery', 'total'));
    }

    public function make_order()
    {
      if(!Session::has('payment_id') || !Session::has('delivery_id'))
        return redirect('cart');

      $cart = session('cart');
      $data = session('order_data');
      $total = $cart->total + Delivery::find(session('delivery_id'))->price;
      $new_order = Order::create($data);
      $new_order->total = $total;
      $new_order->payment_id = session('payment_id');
      $new_order->delivery_id = session('delivery_id');
      $new_order->create_ordered_products($cart->items);
      Session::forget('cart');
      Session::forget('payment_id');
      Session::forget('delivery_id');
      Session::forget('order_data');
      return redirect('/', 304)->with('success', 'Ordered succesfully');
    }
}
