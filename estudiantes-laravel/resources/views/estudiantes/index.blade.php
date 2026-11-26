@extends('layout')
@section('titulo', 'Estudiantes')
@section('contenido')
<h1>Registro de estudiantes</h1>
<p><a href="{{ route('estudiantes.create') }}">Crear estudiante</a></p>
@if (session('estado')) <p class="estado">{{ session('estado') }}</p> @endif
<div class="panel tabla"><table>
<thead><tr><th>ID</th><th>Número de cuenta</th><th>Nombre</th><th>Correo</th><th>Fecha de nacimiento</th><th>Acciones</th></tr></thead>
<tbody>
@forelse ($estudiantes as $estudiante)
<tr><td>{{ $estudiante->id }}</td><td>{{ $estudiante->numero_cuenta }}</td><td>{{ $estudiante->nombre }}</td><td>{{ $estudiante->correo }}</td><td>{{ $estudiante->fecha_nacimiento->format('d/m/Y') }}</td><td>
<a href="{{ route('estudiantes.edit', $estudiante->id) }}">Editar</a>
<form method="POST" action="{{ route('estudiantes.destroy', $estudiante->id) }}" data-confirmar>
@csrf
@method('DELETE')
<button type="submit">Eliminar</button>
</form>
</td></tr>
@empty
<tr><td colspan="6">No hay estudiantes registrados.</td></tr>
@endforelse
</tbody></table></div>
@endsection
