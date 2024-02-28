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

    public function login(UserLoginRequest $request)
    {
        $request=$request->validated();
        $username=$request['username'];
        $password=$request['password'];

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
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
