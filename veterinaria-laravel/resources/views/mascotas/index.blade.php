@extends('layout')
@section('titulo', 'Mascotas')
@section('contenido')
<h1>Registro de mascotas</h1>
<div class="panel tabla"><table>
<thead><tr><th>ID</th><th>Código</th><th>Nombre</th><th>Especie</th><th>Propietario</th><th>Fecha de nacimiento</th></tr></thead>
<tbody>
@forelse ($mascotas as $mascota)
<tr><td>{{ $mascota->id }}</td><td>{{ $mascota->codigo }}</td><td>{{ $mascota->nombre }}</td><td>{{ $mascota->especie }}</td><td>{{ $mascota->propietario }}</td><td>{{ $mascota->fecha_nacimiento->format('d/m/Y') }}</td></tr>
@empty
<tr><td colspan="6">No hay mascotas registradas.</td></tr>
@endforelse
</tbody></table></div>
@endsection
