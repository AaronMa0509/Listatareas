<x-mail::message>
@component('mail::message')
# Recordatorio de Tarea

Hola,

Este es un recordatorio para la siguiente tarea:

**Título:** {{ $task->title }}  
**Descripción:** {{ $task->description }}  
**Fecha de Vencimiento:** {{ $task->due_date }}  

Gracias,<br>
{{ config('app.name') }}
@endcomponent
</x-mail::message>
