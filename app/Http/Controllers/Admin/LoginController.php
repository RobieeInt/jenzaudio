<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('admin.auth');
    }

    public function auth(Request $request) {
        $data = $request->except('_token');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['roles'] = 'admin';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Pastikan Email atau password anda benar',
        ])->withInput();
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
