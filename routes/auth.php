<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'create'])
                ->name('register');

    Route::post('register', [UserController::class, 'create'])
                ->name('users.create');

    Route::post('register', [UserController::class, 'store'])
                ->name('users.store');
            
    Route::get('login', [SessionsController::class, 'create'])
                ->name('sessions.create');
    
    Route::post('login', [SessionsController::class, 'store'])
                ->name('sessions.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::get('admin/profile', [UserController::class, 'index'])
                ->name('users.index');

    Route::get('{user:username}/profile/delete', [UserController::class, 'destroy'])
                ->name('users.destroy');

    Route::get('{user:username}/profile/edit', [UserController::class, 'edit'])
                ->name('users.edit');

    Route::post('{user:username}/profile/edit', [UserController::class, 'update'])
                ->name('users.update');

    Route::get('admin/{post:slug}/edit', [PostController::class, 'edit'])
                ->name('posts.edit');
    
    Route::post('admin/{post:slug}/edit', [PostController::class, 'update'])
                ->name('posts.update');
                
    Route::get('admin/{post:slug}/delete', [PostController::class, 'destroy'])
                ->name('posts.destroy');

    Route::post('posts/{post:slug}/comments', [CommentController::class, 'store'])
                ->name('comments.store');
    
    Route::get('mailinglist/signup', [UserController::class, 'mailinglist']) 
                ->name('mailinglist.signup');
                
    Route::post('mailinglist/signup/success', [UserController::class, 'mailinglistSuccess'])
                ->name('mailinglist.success');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
 