<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// public routes
Route::get('/', function () {
    return Inertia::render('Home');
})->name('homepage');

// auth routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'show_register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

    Route::get('/login', [AuthController::class, 'show_login'])->name('auth.login');
    Route::post("/login", [AuthController::class, 'login'])->name('auth.login');

});

// routes only for authenticated users
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
