<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea Actualizada</title>
</head>
<body>
    <h1>Tarea Actualizada</h1>
    <p>Hola {{ $task->user->name }},</p>
    <p>La tarea "{{ $task->title }}" ha sido actualizada.</p>
    <p>Descripción actualizada: {{ $task->description }}</p>
    <p>Fecha de vencimiento actualizada: {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</p>
</body>
</html>
