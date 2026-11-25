<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LibroController
{
    public function index()
    {
        return view('libros.index', ['libros' => Libro::orderBy('id')->get()]);
    }

    public function create()
    {
        return view('libros.form', ['libro' => new Libro]);
    }

    public function store(Request $request)
    {
        Libro::create($this->validar($request));

        return to_route('libros.index')->with('estado', 'Libro registrado.');
    }

    public function edit(Libro $libro)
    {
        return view('libros.form', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $libro->update($this->validar($request, $libro));

        return to_route('libros.index')->with('estado', 'Libro actualizado.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return to_route('libros.index')->with('estado', 'Libro eliminado.');
    }

    private function validar(Request $request, ?Libro $libro = null): array
    {
        $codigoUnico = Rule::unique('libros', 'codigo');
        if ($libro !== null) {
            $codigoUnico->ignore($libro);
        }

        return $request->validate([
            'codigo' => ['required', 'string', 'max:255', $codigoUnico],
            'titulo' => ['required', 'string', 'max:150'],
            'autor' => ['required', 'string', 'max:100'],
            'anio_publicacion' => ['required', 'integer', 'between:1450,'.now()->year],
        ], [
            'required' => 'Completa este campo.',
            'string' => 'Ingresa texto válido.',
            'max' => 'Ingresa hasta :max caracteres.',
            'codigo.unique' => 'Ya existe un libro con este código.',
            'anio_publicacion.integer' => 'Ingresa un año entero.',
            'anio_publicacion.between' => 'Ingresa un año entre :min y :max.',
        ]);
    }
}
