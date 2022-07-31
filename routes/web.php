<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    Route::put('/update-profile', [UserController::class, 'update_profile'])->name('user.update');
    Route::get('/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit');
    Route::put('/events/{event}/sold_out', [EventController::class, 'sold_out'])->name('event.sold_out');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}/update', [EventController::class, 'update'])->name('event.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

});
Route::get('/events/{event}',[EventController::class, "show"])->name('events.show');

Route::get('/my_profile', [UserController::class, "my_profile"])->name('my_profile');

Route::inertia('/about', "Footer/About")->name('about');

Route::inertia('/contact', "Footer/Contact")->name('contact');

Route::inertia('/conditions', "Footer/Conditions")->name('conditions');

Route::inertia('/privacy', "Footer/Privacy")->name('privacy');
