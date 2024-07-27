<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-dark rounded">
                    <div class="card-header">
                        Editar Tarea
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tasks.update', ['task' => $task->task_id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Título:</label>
                                <input type="text" class="form-control border-dark rounded" id="title" name="title" value="{{ $task->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción:</label>
                                <textarea class="form-control border-dark rounded" id="description" name="description">{{ $task->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="due_date">Fecha de Vencimiento:</label>
                                <input type="date" class="form-control border-dark rounded" id="due_date" name="due_date" value="{{ $task->due_date }}" required>
                            </div>
                            <div class="form-group">
                                <label for="priority">Prioridad:</label>
                                <select class="form-control border-dark rounded" id="priority" name="priority" required>
                                    <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }}>Baja</option>
                                    <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Media</option>
                                    <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }}>Alta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Estado:</label>
                                <select class="form-control border-dark rounded" id="status" name="status" required>
                                    <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>En Progreso</option>
                                    <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completada</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
                                <a href="{{ route('tasks.index') }}" class="btn btn-danger">Volver a la Lista de Tareas</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
