<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MailRequest;
use Mail;

class MailController extends Controller
{
  public function sendMail(MailRequest $request){
    $data = array(
      'from'=>$request->input('from'),
      'subject'=>$request->input('subject'),
      'mailText'=>$request->input('message'),
    );
    $send = Mail::send('mail.template', $data, function($message)use($request){
      $message->from('ahmed@creativefaze.com', 'Daily Classifieds Contact Submission');
      $message->to('raza1778@gmail.com')->subject($request->input('subject'));
    });
    if ($send) {
      return redirect('contact')->with('mesasge', 'Message sent to our admins.');
    }
    else{
      return back()->withInput()->withErrors();
    }
  }
}
