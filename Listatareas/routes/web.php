<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Rutas protegidas que requieren autenticación
    Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
    Route::get('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');
    Route::put('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
