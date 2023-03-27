<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');

        // dd($request, $credentials);
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('dashboard')
        //                 ->withSuccess('Signed in');
        // }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {
        $email = $request->only('email');

        $response = Http::post('https://3vflwnsyek.execute-api.ap-northeast-1.amazonaws.com/prod/user/check', $email);

        if (empty($response->json())) {
            $check = $this->create($request->all());
        }
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        $user = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ];

        $response = Http::post('https://3vflwnsyek.execute-api.ap-northeast-1.amazonaws.com/prod/user/create', $user);
    }    
    
    public function dashboard()
    {
        // dd(Auth::check());
        // if(Auth::check()){
            return view('dashboard');
        // }
  
        // return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}