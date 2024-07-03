@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard - Lista de Tareas</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Crear Nueva Tarea</a>

        <div class="card">
            <div class="card-header">Mis Tareas</div>

            <div class="card-body">
                @if ($tasks->isEmpty())
                    <p>No tienes tareas.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>
                                        <a href="{{ route('tasks.show', $task->task_id) }}">Ver</a>
                                        <a href="{{ route('tasks.edit', $task->task_id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('tasks.destroy', $task->task_id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
