<?php
use App\Http\Controllers\SesionController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;
Route::redirect('/', '/inicio');
Route::middleware('guest')->group(function () {
    Route::get('/login', [SesionController::class, 'create'])->name('login');
    Route::post('/login', [SesionController::class, 'store'])->middleware('throttle:10,1');
});
Route::middleware('auth')->group(function () {
    Route::get('/inicio', [TareaController::class, 'index'])->name('inicio');
    Route::get('/tareas/crear', [TareaController::class, 'create'])->name('tareas.create');
    Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
    Route::get('/tareas/{id}/editar', [TareaController::class, 'edit'])->whereNumber('id')->name('tareas.edit');
    Route::put('/tareas/{id}', [TareaController::class, 'update'])->whereNumber('id')->name('tareas.update');
    Route::post('/logout', [SesionController::class, 'destroy'])->name('logout');
});
