<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendMail;
class mailler extends Controller
{
    public function sendmail(Request $request){

    	  $name=$request->input('name');
        $email=$request->input('email');
        $message=$request->input('message');
      
      $details = [
      	'title' => 'Title:Mail From Real Programmer',
      	'name' => $name,
      	'body' => 'Body :'.$message,
      ];
      
      \Mail::to($email)->send(new SendMail($details));
      return view('emails.thanks');
    }
}
