<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class HomeController extends Controller
{

    public function index()
    {
        return view('account.index');
    }

    public function close_account()
    {
        Auth::user()->delete();
        return response()->redirect('/')->with('success', 'Your account was deleted successfuly')->setStatusCode(200);
    }
}
