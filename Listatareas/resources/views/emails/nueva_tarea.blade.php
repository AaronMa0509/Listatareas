<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Tarea</title>
</head>
<body>
    <h1>Nueva Tarea Creada</h1>
    <p>Hola {{ $task->user->name }},</p>
    <p>Se ha creado una nueva tarea:</p>
    <p>Título: {{ $task->title }}</p>
    <p>Descripción: {{ $task->description }}</p>
    <p>Fecha de vencimiento: {{ $task->due_date->format('d/m/Y') }}</p>
</body>
</html>
