<!-- resources/views/tasks/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer une Tâche</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 50px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .btn {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Éditer la Tâche</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Statut :</label>
                        <select id="status" name="status" class="form-control">
                            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>En Attente</option>
                            <option value="ongoing" {{ old('status', $task->status) == 'ongoing' ? 'selected' : '' }}>En Cours</option>
                            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Terminé</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="project_id">Projet :</label>
                        <select id="project_id" name="project_id" class="form-control">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Mettre à Jour</button>
                </form>

                <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Retour à la Liste</a>
            </div>
        </div>
    </div>
</body>
</html>
