@extends('layout')
@section('titulo', 'Crear tarea')
@section('contenido')
<h1>Crear tarea</h1>
@if ($errors->any())
<ul class="error">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('tareas.store') }}" class="campos">
@csrf
<label for="titulo">Título</label>
<input id="titulo" name="titulo" value="{{ old('titulo') }}" maxlength="150" required>
<label for="descripcion">Descripción</label>
<textarea id="descripcion" name="descripcion" maxlength="500" required>{{ old('descripcion') }}</textarea>
<label for="responsable">Responsable</label>
<input id="responsable" name="responsable" value="{{ old('responsable') }}" maxlength="100" required>
<label for="fecha_limite">Fecha límite</label>
<input id="fecha_limite" name="fecha_limite" type="date" value="{{ old('fecha_limite') }}" required>
<label for="estado">Estado</label>
<select id="estado" name="estado" required>
<option value="">Seleccione un estado</option>
@foreach (['pendiente' => 'Pendiente', 'en proceso' => 'En proceso', 'completada' => 'Completada'] as $valor => $etiqueta)
<option value="{{ $valor }}" @selected(old('estado') === $valor)>{{ $etiqueta }}</option>
@endforeach
</select>
<button class="boton principal" type="submit">Guardar</button>
<a href="{{ route('inicio') }}">Cancelar</a>
</form>
@endsection
