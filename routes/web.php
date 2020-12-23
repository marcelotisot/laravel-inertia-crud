<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::inertia('/', 'Dashboard');


/*
* Categories
*/
Route::get('categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');   

Route::post('categories', [CategoryController::class, 'store'])
    ->name('categories.store');

Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])
    ->name('categories.edit');

Route::put('categories/{id}', [CategoryController::class, 'update'])
    ->name('categories.update');

Route::delete('categories/{id}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');    

/*
* Posts
*/
Route::get('posts', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('posts/getCategories', [PostController::class, 'getCategories'])
    ->name('posts.getCategories');

Route::get('posts/create', [PostController::class, 'create'])
    ->name('posts.create');

Route::post('posts', [PostController::class, 'store'])
    ->name('posts.store');