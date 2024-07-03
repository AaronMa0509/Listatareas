<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard - Lista de Tareas</h2>

        <div class="card">
            <div class="card-header">
            Mis Tareas
                <a href="{{ route('tasks.create') }}" class="btn btn-primary float-right">Crear Nueva Tarea</a>

            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Fecha de Vencimiento</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
