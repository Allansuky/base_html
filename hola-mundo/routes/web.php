<?php

use App\Http\Controllers\SaludoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SaludoController::class, 'index']);
Route::get('/hola', [SaludoController::class, 'index']);
Route::get('/bienvenida', [SaludoController::class, 'index']);
