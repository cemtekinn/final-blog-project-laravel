<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostConroller as AdminPostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

use App\Http\Controllers\Front\UserController as FrontUserController;
use App\Http\Controllers\Front\AuthController as FrontAuthController;

Route::prefix("panel")->group(function () {
    Route::get('/', [AdminAuthController::class ,"index"]);
    Route::post('/login',[AdminAuthController::class,"login"])->name("panel.login");
    Route::get('/logout',[AdminAuthController::class,"logout"])->name("panel.logout");
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/posts', AdminPostController::class);
    Route::resource('/tags',AdminTagController::class);
    Route::resource('/announcements',AdminAnnouncementController::class);
});

//Front
Route::get('/register',[FrontAuthController::class,'registerIndex']);
Route::post('/register',[FrontUserController::class,'register'])->name("register.post");
Route::get('/login',[FrontAuthController::class,'loginIndex'])->name("login.index");





//Will be delete
Route::get("/hash",function (){
    return \Illuminate\Support\Facades\Hash::make("admin123");
});
