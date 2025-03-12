<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\TasksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('employees', EmployeesController::class);
Route::resource('tasks', TasksController::class);
