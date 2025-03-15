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
})->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'is_user'])->group(function () {
    Route::resource('reservations', ReservationController::class);

});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('admin-reservations', [ReservationController::class, 'index'])->name('admin-reservations.index');
    Route::get('admin-reservations/{id}', [ReservationController::class, 'show'])->name('admin-reservations.show');
    Route::patch('admin-reservations/approve/{id}', [ReservationController::class, 'approve'])->name('admin-reservations.approve');
    Route::patch('admin-reservations/reject/{id}', [ReservationController::class, 'reject'])->name('admin-reservations.reject');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('products', ProductController::class);
    Route::resource('services', ServicesController::class);
    Route::resource('users', UserController::class);
   
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
