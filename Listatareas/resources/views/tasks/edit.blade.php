<!-- resources/views/tasks/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Tarea</h2>

        <form action="{{ route('tasks.update', ['task' => $task->task_id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Fecha de Vencimiento:</label>
                <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}" required>
            </div>
            <div class="form-group">
                <label for="priority">Prioridad:</label>
                <select class="form-control" id="priority" name="priority" required>
                    <option value="Low" {{ $task->priority == 'Low' ? 'selected' : '' }}>Baja</option>
                    <option value="Medium" {{ $task->priority == 'Medium' ? 'selected' : '' }}>Media</option>
                    <option value="High" {{ $task->priority == 'High' ? 'selected' : '' }}>Alta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Estado:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pendiente</option>
                    <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>En Progreso</option>
                    <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
        </form>
    </div>
@endsection
