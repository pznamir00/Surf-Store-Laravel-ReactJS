<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function _404_not_found()
    {
      return response()->view('errors.404_not_found')->setStatusCode(404);
    }
}
