<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationsController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'is_user'])->group(function () { 
    Route::Resource('reservations', ReservationController::class);
    // Route::get('reservations', ReservationController::class);
    // Route::post('reservations', ReservationController::class);
});

// Route::delete('reservations', ReservationController::class);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::resource('products', ProductController::class);
Route::resource('services', ServicesController::class);
Route::resource('users', UserController::class);
// Route::Resource('reservations', ReservationsController::class);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');