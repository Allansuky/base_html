<?php
namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ProductoController
{
    public function index()
    {
        return view('productos.index', ['productos' => Producto::orderBy('id')->get()]);
    }
    public function create()
    {
        return view('productos.create');
    }
    public function store(Request $request)
    {
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:255', 'unique:productos,codigo'],
            'nombre' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'numeric', 'gt:0', 'decimal:0,2', 'max:99999999.99'],
            'existencias' => ['required', 'integer', 'min:0', 'max:4294967295'],
        ]);
        Producto::create($datos);
        return redirect()->route('inicio')->with('estado', 'Producto creado correctamente.');
    }
    public function edit(int $id)
    {
        return view('productos.edit', ['producto' => Producto::findOrFail($id)]);
    }
    public function update(Request $request, int $id)
    {
        $producto = Producto::findOrFail($id);
        $datos = $request->validate([
            'codigo' => ['required', 'string', 'max:255', Rule::unique('productos', 'codigo')->ignore($producto)],
            'nombre' => ['required', 'string', 'max:100'],
            'precio' => ['required', 'numeric', 'gt:0', 'decimal:0,2', 'max:99999999.99'],
            'existencias' => ['required', 'integer', 'min:0', 'max:4294967295'],
        ]);
        $producto->update($datos);
        return redirect()->route('inicio')->with('estado', 'Producto actualizado correctamente.');
    }
    public function destroy(int $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('inicio')->with('estado', 'Producto eliminado correctamente.');
    }
}
