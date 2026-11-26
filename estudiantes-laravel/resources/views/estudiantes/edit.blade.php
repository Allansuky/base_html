@extends('layout')
@section('titulo', 'Editar estudiante')
@section('contenido')
<h1>Editar estudiante</h1>
@if ($errors->any())
<ul class="error">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('estudiantes.update', $estudiante->id) }}" class="campos">
@csrf
@method('PUT')
<label for="numero_cuenta">Número de cuenta</label>
<input id="numero_cuenta" name="numero_cuenta" value="{{ old('numero_cuenta', $estudiante->numero_cuenta) }}" maxlength="255" required>
<label for="nombre">Nombre</label>
<input id="nombre" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}" maxlength="100" required>
<label for="correo">Correo</label>
<input id="correo" name="correo" type="email" value="{{ old('correo', $estudiante->correo) }}" maxlength="255" required>
<label for="fecha_nacimiento">Fecha de nacimiento</label>
<input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento->format('Y-m-d')) }}" required>
<button class="boton principal" type="submit">Actualizar</button>
<a href="{{ route('inicio') }}">Cancelar</a>
</form>
@endsection
