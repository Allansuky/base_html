@extends('layout')
@section('titulo', 'Crear estudiante')
@section('contenido')
<h1>Crear estudiante</h1>
@if ($errors->any())
<ul class="error">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('estudiantes.store') }}" class="campos">
@csrf
<label for="numero_cuenta">Número de cuenta</label>
<input id="numero_cuenta" name="numero_cuenta" value="{{ old('numero_cuenta') }}" maxlength="255" required>
<label for="nombre">Nombre</label>
<input id="nombre" name="nombre" value="{{ old('nombre') }}" maxlength="100" required>
<label for="correo">Correo</label>
<input id="correo" name="correo" type="email" value="{{ old('correo') }}" maxlength="255" required>
<label for="fecha_nacimiento">Fecha de nacimiento</label>
<input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento') }}" required>
<button class="boton principal" type="submit">Guardar</button>
<a href="{{ route('inicio') }}">Cancelar</a>
</form>
@endsection
