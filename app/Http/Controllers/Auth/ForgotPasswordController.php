<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email',  
            function ($attribute, $value, $fail) {
                if (!User::find($value)) {
                    $fail(__('passwords.user'));
                }
            }],
        ]);

        $passwordReset = DB::table('password_resets')
            ->filter('email', '=', $request->email)
            ->scan();
        
        if($passwordReset['Items'] != []){
            return back()->with('error', __('passwords.check_email'));
        }

        $token = Str::random(64);

        $date = Carbon::now()->toDateTimeString();

        DB::table('password_resets')->putItem([
                'email' => $request->email, 
                'token' => $token, 
                'created_at' => $date
            ]);

        Mail::send('mail.passwordReset', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('status', __('passwords.sent'));
    }

    
    public function resetPassword($token) 
    { 
        return view('auth.passwords.reset', ['token' => $token]);
    }
}
