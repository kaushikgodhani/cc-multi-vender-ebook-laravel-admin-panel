<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Validator;
use DB;
use PDF;
use Mail;
use Session;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->email;
       
        $user = User::where('email',$email)->get();

        if($user != NULL)
        {   $pwd =  rand(111111,999999);
            $password = Hash::make($pwd);
            
            $pass = User::where('email',$email)->update(['password'=>$password]);
            $to_name = 'User';
            $to_email = $email;
            $data = array('name'=>$to_name, "body" =>$pwd);

            $mail = Mail::send('forgetmail', $data, function($message) use ($to_email, $to_name) 
            {
                
                $message->to($to_email)->subject('Artisans Web Testing Mail');
                $message->from('vocsy.rajan214@gmail.com','Artisans Web');

            }); 
            return redirect('/login')->with('message', 'Your password has been changed!');
        }
        else
        {
            return redirect()->back()->with('error','This email does not exist');
        }
        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}