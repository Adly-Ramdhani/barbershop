<?php

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReservationController;


Route::get('/', function () {
    $services = Service::all(); // Ambil semua layanan dari database
    return view('index', compact('services'));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'is_user'])->group(function () {
    Route::resource('reservations', ReservationController::class);

});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('products', ProductController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('users', UserController::class);
   
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
