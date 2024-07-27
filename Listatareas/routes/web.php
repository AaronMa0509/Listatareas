<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Models\Task;
use App\Http\Controllers\TaskController;
use App\Mail\RecordatorioMailable;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Rutas protegidas que requieren autenticación
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

Route::put('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');


Route::get('recordatorio',function(){
    
    Mail::to('tasklist@gmail.com')->send(new RecordatorioMailable);

    return "Mensaje enviado";

})->name('recordatorio');


Route::get('test-email', function () {
    // Obtener todas las tareas que vencen en las próximas 24 horas
    $tasks = Task::where('due_date', '>', now())
                 ->where('due_date', '<=', now()->addDay())
                 ->get();

    if ($tasks->isNotEmpty()) {
        foreach ($tasks as $task) {
            Mail::to($task->user->email)->send(new RecordatorioMailable($task));
        }
        return 'Correos enviados a ' . $tasks->count() . ' tareas.';
    } else {
        return 'No hay tareas para enviar.';
    }
})->name('test-email');
