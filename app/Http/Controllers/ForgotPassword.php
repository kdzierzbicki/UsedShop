<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controler;
use Sentinel;
use Reminder;
use App\User;
use Mail;

class ForgotPassword extends Controller
{
    public function forgot(){

        return view('security.forgot');

    }

    public function password(Request $request){

   $user = User::whereEmail($request->email)->first();

   if (count($user)==0){

return redirect()-back()-with(['error'=>'Email nie odnaleziony' ]);
   }

   $user = Sentinel::findById($user->id);

   $reminder = Reminder::exists($user) ? : Reminder::create($user);
   $this->sendEmail($user, $reminder-> code);

   return redirect()->back()->with([ 'success'=> 'Reset Code sent to your email.']);

    }

    public function sendEmail($user , $code ){

        Mail::send(

            'email.forgot',
            ['user' => $user, 'code'=> $code],
            function ($message) use($user){

                $message->to($user->email);
                $message->subject($user->name, "Reset your password.");

            }
        );


    }

}
