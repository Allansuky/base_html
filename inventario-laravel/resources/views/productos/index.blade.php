@extends('layout')
@section('titulo', 'Productos')
@section('contenido')
<h1>Inventario de productos</h1>
<p><a href="{{ route('productos.create') }}">Crear producto</a></p>
@if (session('estado')) <p class="estado">{{ session('estado') }}</p> @endif
<div class="panel tabla"><table>
<thead><tr><th>ID</th><th>Código</th><th>Nombre</th><th>Precio</th><th>Existencias</th></tr></thead>
<tbody>
@forelse ($productos as $producto)
<tr><td>{{ $producto->id }}</td><td>{{ $producto->codigo }}</td><td>{{ $producto->nombre }}</td><td>{{ number_format($producto->precio, 2) }}</td><td>{{ $producto->existencias == 0 ? 'Sin existencias' : $producto->existencias }}</td></tr>
@empty
<tr><td colspan="5">No hay productos registrados.</td></tr>
@endforelse
</tbody></table></div>
@endsection
