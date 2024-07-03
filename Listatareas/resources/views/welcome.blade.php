
@extends('layouts.app')

@section('content')
    @guest
        <p>Bienvenido a mi aplicación.</p>
        <a href="{{ route('login') }}">Iniciar sesión</a>
        <a href="{{ route('register') }}">Registrarse</a>
    @else
        <p>¡Hola, {{ Auth::user()->name }}!</p>
        <p><a href="{{ route('home') }}">Ir a mi página de inicio</a></p>
    @endguest
@endsection
