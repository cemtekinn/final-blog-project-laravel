<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostConroller as AdminPostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;

Route::prefix("panel")->group(function () {
    Route::get('/', function () {return view("admin.pages.main");});
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/posts', AdminPostController::class);
    Route::resource('/tags',AdminTagController::class);
    Route::resource('/announcements',AdminAnnouncementController::class);
});

