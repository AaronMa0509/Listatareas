<!-- resources/views/tasks/home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard - Lista de Tareas</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Crear Nueva Tarea</a>

        <!-- Filtro por Prioridad -->
        <form action="{{ route('tasks.index') }}" method="GET" class="mb-3">
            <div class="form-group">
                <label for="priority">Filtrar por Prioridad:</label>
                <select name="priority" id="priority" class="form-control form-control-sm" onchange="this.form.submit()">
                    <option value="">Todos</option>
                    <option value="Low" {{ request('priority') == 'Low' ? 'selected' : '' }}>Baja</option>
                    <option value="Medium" {{ request('priority') == 'Medium' ? 'selected' : '' }}>Media</option>
                    <option value="High" {{ request('priority') == 'High' ? 'selected' : '' }}>Alta</option>
                </select>
            </div>
        </form>

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
                                <th>Prioridad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->due_date }}</td>
                                    <td>
                                        <form action="{{ route('tasks.updateStatus', $task->task_id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pendiente</option>
                                                <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>En Progreso</option>
                                                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completada</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>{{ $task->priority }}</td>
                                    <td>
                                        <a href="{{ route('tasks.show', $task->task_id) }}" class="btn btn-info btn-sm">Ver</a>
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
