<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/',[HomeController::class, "homepage"])->name('homepage');


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
    Route::resource('events', EventController::class)->only('create', 'store', 'destroy', 'update', 'edit' );
});
Route::get('/events/{event}',[EventController::class, "show"])->name('events.show');
