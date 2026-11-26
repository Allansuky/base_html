<?php
namespace App\Http\Controllers;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class MascotaController
{
    public function index()
    {
        return view('mascotas.index', ['mascotas' => Mascota::orderBy('id')->get()]);
    }
    public function create()
    {
        return view('mascotas.create');
    }
    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:255', 'unique:mascotas,codigo'],
            'nombre' => ['required', 'string', 'max:80'],
            'especie' => ['required', Rule::in(['perro', 'gato', 'otro'])],
            'propietario' => ['required', 'string', 'max:100'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
        ]);
        Mascota::create($datos);
        return redirect()->route('inicio')->with('estado', 'Mascota creada correctamente.');
    }
    public function edit(int $id)
    {
        return view('mascotas.edit', ['mascota' => Mascota::findOrFail($id)]);
    }
    public function update(Request $request, int $id)
    {
        $mascota = Mascota::findOrFail($id);
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:255', Rule::unique('mascotas', 'codigo')->ignore($mascota)],
            'nombre' => ['required', 'string', 'max:80'],
            'especie' => ['required', Rule::in(['perro', 'gato', 'otro'])],
            'propietario' => ['required', 'string', 'max:100'],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
        ]);
        $mascota->update($datos);
        return redirect()->route('inicio')->with('estado', 'Mascota actualizada correctamente.');
    }
}
