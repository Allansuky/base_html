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
    Route::get('/estudiantes/crear', [EstudianteController::class, 'create'])->name('estudiantes.create');
    Route::post('/estudiantes', [EstudianteController::class, 'store'])->name('estudiantes.store');
    Route::get('/estudiantes/{id}/editar', [EstudianteController::class, 'edit'])->whereNumber('id')->name('estudiantes.edit');
    Route::put('/estudiantes/{id}', [EstudianteController::class, 'update'])->whereNumber('id')->name('estudiantes.update');
    Route::delete('/estudiantes/{id}', [EstudianteController::class, 'destroy'])->whereNumber('id')->name('estudiantes.destroy');
    Route::post('/logout', [SesionController::class, 'destroy'])->name('logout');
});
