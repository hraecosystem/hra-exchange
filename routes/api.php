<?php

use Illuminate\Support\Facades\Route;

Route::get('verification', [App\Http\Controllers\Member\RegisterController::class, 'register'])->name('login.create');
