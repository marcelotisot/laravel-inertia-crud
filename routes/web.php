<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::inertia('/', 'Dashboard');


Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);