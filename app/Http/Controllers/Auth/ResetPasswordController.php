<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function reset(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email',  
            function ($attribute, $value, $fail) {
                if (!User::find($value)) {
                    $fail(__('passwords.user'));
                }
            }],
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $passwordReset = DB::table('password_resets')
            ->filter('email', '=', $request->email)
            ->filter('token', '=', $request->token)
            ->scan();

        if($passwordReset['Items'] == []){
            return back()->withInput()->with('error', __('passwords.token'));
        }

        $date = Carbon::now()->toDateTimeString();

        $user = User::find($request->email);
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->deleteItem(['email' => $request->email]);

        return redirect('login')->with('status', __('passwords.reset'));
    }
}
