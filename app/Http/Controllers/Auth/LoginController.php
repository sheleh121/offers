<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

    public function login(Request $request)
    {
        $credentials['name'] = $request->get('login');
        $credentials['password'] = $request->get('password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/offers');
        } else return back()->withErrors(['error' => ['password' =>  'Неверная пара логин/пароль']]);
    }


}
