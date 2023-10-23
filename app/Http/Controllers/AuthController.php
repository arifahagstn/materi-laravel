<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }
    // form register

    public function register()
    {
        return view('auth.register');
    }
    // store register

    public function store(Request $request, User $user, Auth $auth)
    {
        $request->validate([
        'name'  =>  'required|string|max:250',
        'email' =>  'required|email|max:250|unique:users,email',
        'password'  =>  'required|min:8',
        ]);

        $user::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  Hash::make($request->password)
        ]);

        $credential = $request->only('email', 'password');
        $auth::attempt($credential);
        $request->session()->regenerate();

        return redirect()->route('auth.dashboard')
        ->withSuccess('Anda telah registrasi dan login!');
    }


    public function login()
    {
        return view('auth.login');
    }
    // form login

    public function authentication(Request $request, Auth $auth)
    {
        $request->validate([
            'email' =>  'required|email',
            'password'  =>  'required',
            ]);
            $credential = $request->only('email', 'password');
            if($auth::attempt($credential))
            {
                $request->session()->regenerate();
                return redirect()->route('auth.dashboard');
            }

            return back()->withErrors([
                'email' =>  'Email tidak ditemukan',
            ])->onlyInput('email');
        
    }
    // authentication   

    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        
        }

        return redirect()->route('auth.login');
    }
    // dashboard

    public function logout(Request $request, Auth $auth)
    {
        $auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
    // logout
}
