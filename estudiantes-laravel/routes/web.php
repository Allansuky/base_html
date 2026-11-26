<?php
use App\Http\Controllers\SesionController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Route;
Route::redirect('/', '/inicio');
Route::middleware('guest')->group(function () {
    Route::get('/login', [SesionController::class, 'create'])->name('login');
    Route::post('/login', [SesionController::class, 'store'])->middleware('throttle:10,1');
});
Route::middleware('auth')->group(function () {
    Route::get('/inicio', [EstudianteController::class, 'index'])->name('inicio');
    Route::post('/logout', [SesionController::class, 'destroy'])->name('logout');
});
