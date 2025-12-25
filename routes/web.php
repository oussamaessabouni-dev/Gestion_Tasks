<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/toggle-status', [TaskController::class, 'toggleStatus'])
    ->name('tasks.toggleStatus');

