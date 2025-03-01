<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationsController;

Route::middleware('api')->group(function () {
    Route::apiResource('reservations', ReservationsController::class);
});
