<!-- resources/views/tasks/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Tâche</title>
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
        .btn {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Détails de la Tâche</h1>
            </div>
            <div class="card-body">
                <p><strong>Titre :</strong> {{ $task->title }}</p>
                <p><strong>Description :</strong> {{ $task->description }}</p>
                <p><strong>Statut :</strong> {{ $task->status }}</p>
                <p><strong>Projet :</strong> {{ $task->project->name }}</p>

                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Retour à la Liste</a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Éditer</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

