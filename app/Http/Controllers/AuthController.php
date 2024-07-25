<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }


    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required  | string | max:255',
            'email' => 'required | email | unique:users',
            'password' => 'required | string | min:8 | confirmed',
        ]);

        $user = User::create($validateData);

        Auth::login($user);

        return redirect('/Home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
