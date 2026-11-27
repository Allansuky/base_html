<?php
namespace App\Http\Controllers;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class TareaController
{
    public function index()
    {
        return view('tareas.index', ['tareas' => Tarea::orderBy('id')->get()]);
    }
    public function create()
    {
        return view('tareas.create');
    }
    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['required', 'string', 'max:500'],
            'responsable' => ['required', 'string', 'max:100'],
            'fecha_limite' => ['required', 'date'],
            'estado' => ['required', Rule::in(['pendiente', 'en proceso', 'completada'])],
        ]);
        Tarea::create($datos);
        return redirect()->route('inicio')->with('estado', 'Tarea creada correctamente.');
    }
    public function edit(int $id)
    {
        return view('tareas.edit', ['tarea' => Tarea::findOrFail($id)]);
    }
    public function update(Request $request, int $id)
    {
        $tarea = Tarea::findOrFail($id);
        $datos = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['required', 'string', 'max:500'],
            'responsable' => ['required', 'string', 'max:100'],
            'fecha_limite' => ['required', 'date'],
            'estado' => ['required', Rule::in(['pendiente', 'en proceso', 'completada'])],
        ]);
        $tarea->update($datos);
        return redirect()->route('inicio')->with('estado', 'Tarea actualizada correctamente.');
    }
}
