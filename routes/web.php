<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('posts/{post:slug}', [PostController::class, 'show'])
    ->name('posts.show');

Route::get('categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

// Route::get('authors/{}')