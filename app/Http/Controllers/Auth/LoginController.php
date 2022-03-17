<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\UserInfo;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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

    public function login(LoginRequest $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->route('login.form')->with('fail', 'Email hoặc mật khẩu không chính xác');
        }
    }

    protected function logout()
    {
        Auth::logout();
        return redirect(route('login.form'));
    }

    public function redirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('email', $googleUser->email)->first();
            if ($user) {
                Auth::login($user);

                return redirect()->intended('/');
            } else {
                $user = User::create(
                    [
                        'email' => $googleUser->email,
                        'password' => Hash::make('000000')
                    ]
                );

                $user_info = UserInfo::create([
                    'name' => $googleUser->name,
                    'code' => (string)rand(1000, 9999),
                    'role' => UserInfo::ROLE['employee'],
                    'user_id' => $user->_id
                ]);

                Auth::login($user);

                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            Log::error('Error login with google', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
            ]);

            return redirect()->back();
        }
    }
}
