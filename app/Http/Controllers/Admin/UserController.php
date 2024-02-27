<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function store(UserRegisterRequest $request)
    {
        $validatedData = $request->validated();
        $name = $validatedData['name'];
        $lastname = $validatedData['lastname'];
        $username = $validatedData['username'];
        $phone=$validatedData['phone'];
        $password=$validatedData['password'];
        $email=$validatedData['email'];

        User::create([
            "name"=>$name,
            "lastname"=>$lastname,
            "username"=>$username,
            "email"=>$email,
            "phone"=>$phone,
            "password"=>bcrypt($password)
        ]);

        return redirect()->back()->with("success","Kullanıcı başarıyla eklendi");
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
