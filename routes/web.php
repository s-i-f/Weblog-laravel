<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionsController;


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

Route::get('authors/{user:name}', [UserController::class, 'show'])
    ->name('users.show');

Route::get('register', [UserController::class, 'create'])
    ->name('users.create')->middleware('guest');

Route::post('register', [UserController::class, 'store'])
    ->name('users.store')->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])
    ->name('sessions.destroy')->middleware('auth');

Route::get('login', [SessionsController::class, 'create'])
    ->name('sessions.create')->middleware('guest');

Route::post('login', [SessionsController::class, 'store'])
    ->name('sessions.store')->middleware('guest');