<?php
use App\Http\Controllers\SesionController;
use App\Http\Controllers\MascotaController;
use Illuminate\Support\Facades\Route;
Route::redirect('/', '/inicio');
Route::middleware('guest')->group(function () {
    Route::get('/login', [SesionController::class, 'create'])->name('login');
    Route::post('/login', [SesionController::class, 'store'])->middleware('throttle:10,1');
});
Route::middleware('auth')->group(function () {
    Route::get('/inicio', [MascotaController::class, 'index'])->name('inicio');
    Route::get('/mascotas/crear', [MascotaController::class, 'create'])->name('mascotas.create');
    Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store');
    Route::get('/mascotas/{id}/editar', [MascotaController::class, 'edit'])->whereNumber('id')->name('mascotas.edit');
    Route::put('/mascotas/{id}', [MascotaController::class, 'update'])->whereNumber('id')->name('mascotas.update');
    Route::delete('/mascotas/{id}', [MascotaController::class, 'destroy'])->whereNumber('id')->name('mascotas.destroy');
    Route::post('/logout', [SesionController::class, 'destroy'])->name('logout');
});
