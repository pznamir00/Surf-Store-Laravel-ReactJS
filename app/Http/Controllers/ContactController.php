<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Config;

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
          'message' => 'required',
      ]);

      try{
        $data = array(
          'email' => $request->email,
          'subject' => $request->subject,
          '_message' => $request->message,
          'app_name' => config('app.name'),
          'app_mail' => env('MAIL_USERNAME', null),
        );

        Mail::send('contact.message', $data, function($message) use ($data){
          $message->from($data['app_mail'], $data['email']);
          $message->to($data['app_mail'], 'To '.$data['app_name'])->subject($data['subject']);
        });
        return redirect('/', 307)->with('success', 'Successful sent message');
      }
      catch(Exception $e){
        return redirect('/', 303)->with('error', 'Failed to submit your message');
      }
    }
}
