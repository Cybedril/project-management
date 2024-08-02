<?php

namespace App\Http\Controllers;
use App\Models\Project; 
use App\Models\Task;    
use Illuminate\Http\Request;

class TaskController extends Controller
    {
        /**
         * Afficher la liste des tâches.
         */
        public function index()
        {
            $tasks = Task::with('project')->get(); // Charge toutes les tâches avec leurs projets
            return view('tasks.index', compact('tasks'));
        }
    
        /**
         * Afficher le formulaire pour créer une nouvelle tâche.
         */
        public function create()
        {
            $projects = Project::all(); // Récupère tous les projets pour les associer à une tâche
            return view('tasks.create', compact('projects'));
        }
    
        /**
         * Stocker une nouvelle tâche dans la base de données.
         */
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|string|in:pending,ongoing,completed',
                'project_id' => 'required|exists:projects,id',
            ]);
    
            Task::create($request->all());
    
            return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
        }
    
        /**
         * Afficher les détails d'une tâche spécifique.
         */
        public function show(Task $task)
        {
            return view('tasks.show', compact('task'));
        }
    
        /**
         * Afficher le formulaire pour éditer une tâche spécifique.
         */
        public function edit(Task $task)
        {
            $projects = Project::all();
            return view('tasks.edit', compact('task', 'projects'));
        }
    
        /**
         * Mettre à jour une tâche spécifique dans la base de données.
         */
        public function update(Request $request, Task $task)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'required|string|in:pending,ongoing,completed',
                'project_id' => 'required|exists:projects,id',
            ]);
    
            $task->update($request->all());
    
            return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
        }
    
        /**
         * Supprimer une tâche spécifique de la base de données.
         */
        public function destroy(Task $task)
        {
            $task->delete();
    
            return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
        }
    }