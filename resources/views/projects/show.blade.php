<!-- resources/views/projects/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Projet</title>
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
            background-color: #17a2b8;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Détails du Projet</h1>
            </div>
            <div class="card-body">
                <p><strong>Nom :</strong> {{ $project->name }}</p>
                <p><strong>Description :</strong> {{ $project->description }}</p>
                <p><strong>Date de Début :</strong> {{ $project->start_date }}</p>
                <p><strong>Date de Fin :</strong> {{ $project->end_date }}</p>

                <div class="btn-group" role="group">
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Retour à la Liste</a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Éditer</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

