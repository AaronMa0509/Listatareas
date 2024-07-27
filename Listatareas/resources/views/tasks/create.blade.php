@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nueva Tarea</h2>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-dark rounded">
                    <div class="card-header">Nueva Tarea</div>
                    <div class="card-body">
                        <!-- Formulario de creación de tarea -->
                        <form action="{{ route('tasks.store') }}" method="POST" id="taskForm">
                            @csrf
                            <div class="form-group">
                                <label for="title">Título:</label>
                                <input type="text" class="form-control border rounded" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción:</label>
                                <textarea class="form-control border rounded" id="description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="due_date">Fecha de Vencimiento:</label>
                                <input type="date" class="form-control border rounded" id="due_date" name="due_date" required>
                            </div>
                            <div class="form-group">
                                <label for="priority">Prioridad:</label>
                                <select class="form-control border rounded" id="priority" name="priority" required>
                                    <option value="Low">Baja</option>
                                    <option value="Medium">Media</option>
                                    <option value="High">Alta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Estado:</label>
                                <select class="form-control border rounded" id="status" name="status" required>
                                    <option value="Pending">Pendiente</option>
                                    <option value="In Progress">En Progreso</option>
                                    <option value="Completed">Completada</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear Tarea</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast de éxito -->
    <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
        <div class="toast" id="successToast" style="min-width: 250px;" data-delay="3000">
            <div class="toast-header">
                <strong class="mr-auto text-success">Éxito</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                ¡Tarea creada con éxito!
            </div>
        </div>
    </div>

    <script>
        document.getElementById('taskForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = this;
            const toast = document.getElementById('successToast');

            // Mostrar el toast de éxito
            $(toast).toast('show');

            // Simular un retraso antes de enviar el formulario (para mostrar la animación)
            setTimeout(function() {
                form.submit();
            }, 2000);
        });
    </script>
@endsection
