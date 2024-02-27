<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Users\UserLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('admin.pages.main');
        } else {
            return view('admin.pages.auth.login');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/panel');
        } else {
            return redirect('/panel')->with('error', 'Hatalı giriş bilgileri');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/panel');
    }

}
