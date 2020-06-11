<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubmitEmail;

class ContactController extends Controller
{
    public function index()
    {
      return view('contact.index');
    }

    public function submit_message(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'subject' => 'required',
        'content' => 'required|max:255'
      ]);

      $data = array(
        'email' => $request->input('email'),
        'subject' => $request->input('subject'),
        'content' => $request->input('content')
      );

      Mail::to('example@gmail.com')->send(new SubmitEmail($data));
      return back()->with('success', 'Thanks for your ask');
    }
}
