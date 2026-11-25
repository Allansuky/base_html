<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\SesionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/libros');

Route::middleware('guest')->group(function () {
    Route::get('login', [SesionController::class, 'create'])->name('login');
    Route::post('login', [SesionController::class, 'store'])->middleware('throttle:10,1');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [SesionController::class, 'destroy'])->name('logout');
    Route::resource('libros', LibroController::class)->except('show')->parameters(['libros' => 'libro']);
});
