@extends('layout')
@php($tituloFormulario = $libro->exists ? 'Editar libro' : 'Registrar libro')
@section('titulo', $tituloFormulario)

@section('contenido')
    <div class="encabezado"><h1>{{ $tituloFormulario }}</h1></div>

    <form class="panel tarjeta campos" method="POST" action="{{ $libro->exists ? route('libros.update', $libro) : route('libros.store') }}">
        @csrf
        @if ($libro->exists)
            @method('PUT')
        @endif

        @foreach (['codigo' => ['Código', 255], 'titulo' => ['Título', 150], 'autor' => ['Autor', 100], 'anio_publicacion' => ['Año de publicación', null]] as $campo => [$etiqueta, $longitud])
            <div>
                <label for="{{ $campo }}">{{ $etiqueta }}</label>
                <input id="{{ $campo }}" name="{{ $campo }}" value="{{ old($campo, $libro->{$campo}) }}" required
                    @if ($longitud) maxlength="{{ $longitud }}" @else type="number" min="1450" max="{{ now()->year }}" @endif
                    @error($campo) aria-invalid="true" aria-describedby="error-{{ $campo }}" @enderror>
                @error($campo) <p class="error" id="error-{{ $campo }}">{{ $message }}</p> @enderror
            </div>
        @endforeach

        <div class="acciones">
            <button class="boton principal">Guardar libro</button>
            <a class="boton secundario" href="{{ route('libros.index') }}">Cancelar</a>
        </div>
    </form>
@endsection
