<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function failed()
    {
        return view('failed');
    }

    public function login(Request $request)
    {
        $request->validate([
            'ip' => 'required',
            'user' => 'required'
        ]);
        
        $ip = $request->post('ip');
        $user = $request->post('user');
        $password = $request->post('password');

        $data = [
            'ip' => $ip,
            'user' => $user,
            'password' => $password,
        ];

        // dd($data);

        $request->session()->put($data);

        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('ip');
        $request->session()->forget('user');
        $request->session()->forget('password');

        return redirect()->route('login');
    }
}
