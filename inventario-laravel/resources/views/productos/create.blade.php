@extends('layout')
@section('titulo', 'Crear producto')
@section('contenido')
<h1>Crear producto</h1>
@if ($errors->any())
<ul class="error">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('productos.store') }}" class="campos">
@csrf
<label for="codigo">Código</label>
<input id="codigo" name="codigo" value="{{ old('codigo') }}" maxlength="255" required>
<label for="nombre">Nombre</label>
<input id="nombre" name="nombre" value="{{ old('nombre') }}" maxlength="100" required>
<label for="precio">Precio</label>
<input id="precio" name="precio" type="number" min="0.01" step="0.01" value="{{ old('precio') }}" required>
<label for="existencias">Existencias</label>
<input id="existencias" name="existencias" type="number" min="0" step="1" value="{{ old('existencias') }}" required>
<button class="boton principal" type="submit">Guardar</button>
<a href="{{ route('inicio') }}">Cancelar</a>
</form>
@endsection
