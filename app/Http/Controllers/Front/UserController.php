<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function register(UserRegisterRequest $request)
    {
        $validatedData = $request->validated();
        $name = $validatedData['name'];
        $lastname = $validatedData['lastname'];
        $username = $validatedData['username'];
        $phone=$validatedData['phone'];
        $password=$validatedData['password'];
        $email=$validatedData['email'];

        $user=User::create([
            "name"=>$name,
            "lastname"=>$lastname,
            "username"=>$username,
            "email"=>$email,
            "phone"=>$phone,
            "password"=>bcrypt($password)
        ]);
        $user->assignRole("User");
        return redirect()->back()->with("success","Kullanıcı başarıyla eklendi");
    }
}
