<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('/');
        } else {
            return redirect()->back();
        }
    }

    protected function logout()
    {
        Auth::logout();
        return redirect(route('login.form'));
    }
}
