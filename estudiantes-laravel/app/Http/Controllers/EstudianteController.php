<?php
namespace App\Http\Controllers;
use App\Models\Estudiante;
use Illuminate\Http\Request;
class EstudianteController
{
    public function index()
    {
        return view('estudiantes.index', ['estudiantes' => Estudiante::orderBy('id')->get()]);
    }
    public function create()
    {
        return view('estudiantes.create');
    }
    public function store(Request $request)
    {
        $datos = $request->validate([
            'numero_cuenta' => ['required', 'string', 'max:255', 'unique:estudiantes,numero_cuenta'],
            'nombre' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email', 'max:255', 'unique:estudiantes,correo'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
        ]);
        Estudiante::create($datos);
        return redirect()->route('inicio')->with('estado', 'Estudiante creado correctamente.');
    }
}
