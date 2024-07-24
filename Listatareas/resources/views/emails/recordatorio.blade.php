<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordatorio de Tarea</title>
</head>
<body>
    <h1>Recordatorio de Tarea</h1>
    <p>Hola {{ $task->user->name }},</p>
    <p>Este es un recordatorio de que la tarea "{{ $task->title }}" vence mañana.</p>
    <p>Descripción: {{ $task->description }}</p>
    <p>Fecha de vencimiento: {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</p>
</body>
</html>
