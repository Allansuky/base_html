@extends('layout')
@section('titulo', 'Editar producto')
@section('contenido')
<h1>Editar producto</h1>
@if ($errors->any())
<ul class="error">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
@endif
<form method="POST" action="{{ route('productos.update', $producto->id) }}" class="campos">
@csrf
@method('PUT')
<label for="codigo">Código</label>
<input id="codigo" name="codigo" value="{{ old('codigo', $producto->codigo) }}" maxlength="255" required>
<label for="nombre">Nombre</label>
<input id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" maxlength="100" required>
<label for="precio">Precio</label>
<input id="precio" name="precio" type="number" min="0.01" step="0.01" value="{{ old('precio', $producto->precio) }}" required>
<label for="existencias">Existencias</label>
<input id="existencias" name="existencias" type="number" min="0" step="1" value="{{ old('existencias', $producto->existencias) }}" required>
<button class="boton principal" type="submit">Actualizar</button>
<a href="{{ route('inicio') }}">Cancelar</a>
</form>
@endsection
