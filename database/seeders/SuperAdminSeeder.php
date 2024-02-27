<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $user->name = 'super';
        $user->username = 'superadmin';
        $user->lastname = "admin";
        $user->email = "admin@blog.com";
        $user->password = Hash::make('admin123');
        $user->is_super_admin = true;
        $user->phone = "05511326793";
        $user->save();
    }
}

