<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegisterController::class, 'index']);
Route::post('/', [RegisterController::class, 'store'])->name('register');
