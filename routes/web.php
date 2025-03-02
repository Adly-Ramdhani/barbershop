<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReservationsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::resource('products', ProductController::class);
Route::resource('services', ServicesController::class);
Route::resource('users', UserController::class);
// Route::apiResource('reservations', ReservationsController::class);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');