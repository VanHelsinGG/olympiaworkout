<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    });
});

// Debug Routes
Route::prefix('/debug')->group(function () {
    Route::get('/user', function () {
        $users = User::all();
        return $users;
    });
    Route::get('/tables', function () {
        $tables = DB::select('SHOW TABLES');

        return collect($tables)->flatten();
    });
});
