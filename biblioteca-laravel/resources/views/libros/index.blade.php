@extends('layout')
@section('titulo', 'Catálogo de libros')

@section('contenido')
    <div class="encabezado">
        <div>
            <h1>Catálogo de libros</h1>
            <p>{{ $libros->count() }} {{ $libros->count() === 1 ? 'libro registrado' : 'libros registrados' }}</p>
        </div>
        <a class="boton principal" href="{{ route('libros.create') }}">+ Nuevo libro</a>
    </div>

    @if (session('estado'))
        <p class="estado" role="status">{{ session('estado') }}</p>
    @endif

    <div class="panel tabla">
        <table aria-label="Libros del catálogo">
            <thead>
                <tr>
                    <th scope="col">ID</th><th scope="col">Código</th><th scope="col">Título</th>
                    <th scope="col">Autor</th><th scope="col">Año</th><th scope="col">Creado</th>
                    <th scope="col">Actualizado</th><th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($libros as $libro)
                    <tr>
                        <td class="dato">{{ $libro->id }}</td>
                        <td><span class="codigo">{{ $libro->codigo }}</span></td>
                        <th scope="row">{{ $libro->titulo }}</th>
                        <td>{{ $libro->autor }}</td>
                        <td class="dato">{{ $libro->anio_publicacion }}</td>
                        <td class="dato fecha">{{ $libro->created_at->format('d/m/Y H:i') }}</td>
                        <td class="dato fecha">{{ $libro->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="acciones">
                                <a class="editar" href="{{ route('libros.edit', $libro) }}">Editar</a>
                                <form method="POST" action="{{ route('libros.destroy', $libro) }}" data-confirmar>
                                    @csrf
                                    @method('DELETE')
                                    <button class="eliminar">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="8" class="vacio">Todavía no hay libros registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
