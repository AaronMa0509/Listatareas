<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecordatorioMailable;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Auth::user()->tasks(); // Obtener las tareas del usuario autenticado
    
        // Aplicar filtro por prioridad si se proporciona
        if ($request->has('priority') && $request->input('priority') != '') {
            $tasks = $tasks->where('priority', $request->input('priority'));
        }
    
        // Ordenar tareas, completadas al final
        $tasks = $tasks->orderBy('status', 'asc') // Ordena por estado (Pendiente, En Progreso, Completada)
                       ->orderBy('due_date', 'asc') // Ordena por fecha de vencimiento
                       ->get(); // Obtener las tareas después de aplicar el filtro
    
        return view('home', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'priority' => 'required|in:Low,Medium,High',
        'status' => 'required|in:Pending,In Progress,Completed',
    ]);

    $task = new Task();
    $task->title = $request->input('title');
    $task->description = $request->input('description');
    $task->due_date = $request->input('due_date');
    $task->priority = $request->input('priority');
    $task->status = $request->input('status');

    Auth::user()->tasks()->save($task);

    $task->due_date = \Carbon\Carbon::parse($task->due_date);

    Mail::to(Auth::user()->email)->send(new RecordatorioMailable($task, 'new'));

    return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
}


    public function show(Task $task)
    {
        
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task->update($request->all());

        Mail::to(Auth::user()->email)->send(new RecordatorioMailable($task, 'update'));

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
    $task = Task::find($id);
    $task->status = $request->input('status');
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Estado de la tarea actualizado con éxito.');
    }

    

    public function destroy(Task $task)
    {
        
        $task->delete();

        Mail::to(Auth::user()->email)->send(new RecordatorioMailable($task));

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
