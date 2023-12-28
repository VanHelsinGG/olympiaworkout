<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Landing Page
Route::get('/', 'LandingController@index')->name('home');

// Authentication Routes
Route::prefix('/auth')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.register');
        Route::post('/register', [AuthController::class, 'register']);
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
        Route::post('/login', [AuthController::class, 'login']);
        Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('forgot-password');
        Route::post('/forgot-password', [AuthController::class, 'sendPasswordResetLink']);
    });
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::prefix('/user')->group(function () {
        Route::get('/main', [UserController::class, 'showMainPage'])->name('user.main');
        
        Route::prefix('/post')->group(function (){
            Route::post('/', [PostController::class, 'create'])->name('user.post.create');
            Route::post('/{post}/react/{type}', [PostController::class, 'react'])->name('user.post.react');
            Route::delete('/{post}', [PostController::class, 'delete']);
            Route::patch('/{post}', [PostController::class, 'update']);
            Route::post('/{post}/report', [PostController::class, 'report']);
        });
    });
});

