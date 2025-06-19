<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// Las rutas API no tienen CSRF por defecto
Route::apiResource('todos', TodoController::class);

// Route::get('todos', [TodoController::class, 'index']);
// Route::post('todos', [TodoController::class, 'store']);
// Route::get('todos/{id}', [TodoController::class, 'show']);
// Route::put('todos/{id}', [TodoController::class, 'update']);
// Route::patch('todos/{id}', [TodoController::class, 'update']);
// Route::delete('todos/{id}', [TodoController::class, 'destroy']);
