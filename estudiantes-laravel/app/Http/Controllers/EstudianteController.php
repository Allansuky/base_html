<?php
namespace App\Http\Controllers;
use App\Models\Estudiante;
class EstudianteController
{
    public function index()
    {
        return view('estudiantes.index', ['estudiantes' => Estudiante::orderBy('id')->get()]);
    }
}
