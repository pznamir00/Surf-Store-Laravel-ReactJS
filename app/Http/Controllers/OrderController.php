<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

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
      return view('order.index', compact('data'));
    }

    public function save_data_form(Request $req)
    {
      $data = $req->all();
      Session::put('order_data', $data);
      return redirect('order/pay-way');
    }

    public function pay_way(Request $req)
    {
      return view('order.payway');
    }

    public function delivery()
    {

    }
}
