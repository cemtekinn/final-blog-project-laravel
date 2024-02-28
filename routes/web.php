<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostConroller as AdminPostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\SubscribeController as AdminSubscribeController;

use App\Http\Controllers\Front\AuthController as FrontAuthController;

Route::prefix("panel")->group(function () {
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/posts', AdminPostController::class);
    Route::resource('/tags',AdminTagController::class);
    Route::resource('/announcements',AdminAnnouncementController::class);
    Route::resource('/subscribers',AdminSubscribeController::class);

    Route::get('/', [AdminAuthController::class ,"index"]);
    Route::post('/login',[AdminAuthController::class,"login"])->name("panel.login");
    Route::get('/logout',[AdminAuthController::class,"logout"])->name("panel.logout");
});

//Front
Route::get('/register',[FrontAuthController::class,'registerIndex']);
Route::post('/register',[FrontAuthController::class,'register'])->name("register.post");
Route::get('/login',[FrontAuthController::class,'loginIndex'])->name("login.index");



Route::get("/test",[\App\Http\Controllers\TestController::class,"test"]);
