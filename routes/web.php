<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PostConroller as AdminPostController;

Route::get('/', function () {
    return view("admin.index");
});

Route::prefix("panel")->group(function () {
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource("/posts", AdminPostController::class);
});


