<?php
namespace App\Http\Controllers;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
    public function edit(int $id)
    {
        return view('estudiantes.edit', ['estudiante' => Estudiante::findOrFail($id)]);
    }
    public function update(Request $request, int $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $datos = $request->validate([
            'numero_cuenta' => ['required', 'string', 'max:255', Rule::unique('estudiantes', 'numero_cuenta')->ignore($estudiante)],
            'nombre' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email', 'max:255', Rule::unique('estudiantes', 'correo')->ignore($estudiante)],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
        ]);
        $estudiante->update($datos);
        return redirect()->route('inicio')->with('estado', 'Estudiante actualizado correctamente.');
    }
    public function destroy(int $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return redirect()->route('inicio')->with('estado', 'Estudiante eliminado correctamente.');
    }
}
