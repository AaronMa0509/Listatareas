<!-- resources/views/tasks/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nueva Tarea</h2>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="due_date">Fecha de Vencimiento:</label>
                <input type="date" class="form-control" id="due_date" name="due_date" required>
            </div>
            <div class="form-group">
                <label for="priority">Prioridad:</label>
                <select class="form-control" id="priority" name="priority" required>
                    <option value="Low">Baja</option>
                    <option value="Medium">Media</option>
                    <option value="High">Alta</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Estado:</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Pending">Pendiente</option>
                    <option value="In Progress">En Progreso</option>
                    <option value="Completed">Completada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Tarea</button>
        </form>
    </div>
@endsection
