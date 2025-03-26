<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// EMPLOYEES ROUTES
route::get('/employees', [EmployeesController::class, 'index']);
route::post('/employees', [EmployeesController::class, 'store']);
route::put('/employees/{employee}', [EmployeesController::class, 'update']);
route::delete('/employees/{employee}', [EmployeesController::class, 'destroy']);

// TASKS ROUTES
route::get('/tasks', [TasksController::class, 'index']);
route::post('/tasks', [TasksController::class, 'store']);
route::put('/tasks/{task}', [TasksController::class, 'update']);
route::delete('/tasks/{task}', [TasksController::class, 'destroy']);


// Route::resource('employees', EmployeesController::class);
// Route::resource('tasks', TasksController::class);
