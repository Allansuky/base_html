<?php
namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;
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
}
