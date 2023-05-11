<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\DashBoardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DefaultController::class, 'index'])->name('home');
Route::get('/login', [DefaultController::class, 'login'])->name('login');


Route::middleware(['auth.impulse'])->group(function () {
    Route::get('/dashboard', [DashBoardController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [DashBoardController::class, 'logout'])->name('logout');
});

