<?php

// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->get();

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
            'due_date' => 'required|date',
            'priority' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        auth()->user()->tasks()->create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tarea creada exitosamente.');
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
            'due_date' => 'required|date',
            'priority' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada exitosamente.');
    }
}

