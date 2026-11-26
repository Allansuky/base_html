@extends('layout')
@section('titulo', 'Iniciar sesión')
@section('clase', 'acceso')

@section('contenido')
    <section class="panel tarjeta">
        <h1>Iniciar sesión</h1>
        <p>Ingresa tus credenciales para administrar mascotas.</p>

        <form method="POST" action="{{ route('login') }}" class="campos">
            @csrf
            <div>
                <label for="username">Usuario</label>
                <input id="username" name="username" value="{{ old('username') }}" autocomplete="username" required @error('username') aria-invalid="true" aria-describedby="error-usuario" @enderror>
                @error('username') <p class="error" id="error-usuario">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input id="password" type="password" name="password" autocomplete="current-password" required @error('password') aria-invalid="true" aria-describedby="error-clave" @enderror>
                @error('password') <p class="error" id="error-clave">{{ $message }}</p> @enderror
            </div>
            <button class="boton principal">Ingresar</button>
        </form>
    </section>
@endsection
