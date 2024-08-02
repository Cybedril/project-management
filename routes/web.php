<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// Routes pour les projets
Route::resource('projects', ProjectController::class);

// Routes pour les tâches
Route::resource('tasks', TaskController::class);
