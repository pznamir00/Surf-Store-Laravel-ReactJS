<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function _404_not_found()
    {
      return view('errors.404_not_found');
    }
}
