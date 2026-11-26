@extends('layout')
@section('titulo', 'Editar mascota')
@section('contenido')
<h1>Editar mascota</h1>
@if ($errors->any())
<ul class="error">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('mascotas.update', $mascota->id) }}" class="campos">
@csrf
@method('PUT')
<label for="codigo">Código</label>
<input id="codigo" name="codigo" value="{{ old('codigo', $mascota->codigo) }}" maxlength="255" required>
<label for="nombre">Nombre</label>
<input id="nombre" name="nombre" value="{{ old('nombre', $mascota->nombre) }}" maxlength="80" required>
<label for="especie">Especie</label>
<select id="especie" name="especie" required>
<option value="">Seleccione una especie</option>
@foreach (['perro' => 'Perro', 'gato' => 'Gato', 'otro' => 'Otro'] as $valor => $etiqueta)
<option value="{{ $valor }}" @selected(old('especie', $mascota->especie) === $valor)>{{ $etiqueta }}</option>
@endforeach
</select>
<label for="propietario">Propietario</label>
<input id="propietario" name="propietario" value="{{ old('propietario', $mascota->propietario) }}" maxlength="100" required>
<label for="fecha_nacimiento">Fecha de nacimiento</label>
<input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento->format('Y-m-d')) }}" required>
<button class="boton principal" type="submit">Actualizar</button>
<a href="{{ route('inicio') }}">Cancelar</a>
</form>
@endsection
