<?php
use App\Http\Controllers\SesionController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
Route::redirect('/', '/inicio');
Route::middleware('guest')->group(function () {
    Route::get('/login', [SesionController::class, 'create'])->name('login');
    Route::post('/login', [SesionController::class, 'store'])->middleware('throttle:10,1');
});
Route::middleware('auth')->group(function () {
    Route::get('/inicio', [ProductoController::class, 'index'])->name('inicio');
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])->whereNumber('id')->name('productos.edit');
    Route::put('/productos/{id}', [ProductoController::class, 'update'])->whereNumber('id')->name('productos.update');
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->whereNumber('id')->name('productos.destroy');
    Route::post('/logout', [SesionController::class, 'destroy'])->name('logout');
});
