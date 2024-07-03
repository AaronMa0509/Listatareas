<!-- resources/views/tasks/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detalles de la Tarea
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $task->title }}</h5>
                <p class="card-text"><strong>Descripción:</strong> {{ $task->description }}</p>
                <p class="card-text"><strong>Fecha de Vencimiento:</strong> {{ $task->due_date }}</p>
                <p class="card-text"><strong>Prioridad:</strong> {{ $task->priority }}</p>
                <p class="card-text"><strong>Estado:</strong> {{ $task->status }}</p>

                <!-- Puedes agregar más detalles según sea necesario -->

                <a href="{{ route('tasks.index') }}" class="btn btn-primary">Volver a la Lista de Tareas</a>
            </div>
        </div>
    </div>
@endsection
