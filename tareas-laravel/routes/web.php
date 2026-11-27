<?php
use App\Http\Controllers\SesionController;
use Illuminate\Support\Facades\Route;
Route::redirect('/', '/inicio');
Route::middleware('guest')->group(function () {
    Route::get('/login', [SesionController::class, 'create'])->name('login');
    Route::post('/login', [SesionController::class, 'store'])->middleware('throttle:10,1');
});
Route::middleware('auth')->group(function () {
    Route::view('/inicio', 'inicio')->name('inicio');
    Route::post('/logout', [SesionController::class, 'destroy'])->name('logout');
});
