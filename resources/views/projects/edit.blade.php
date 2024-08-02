<!-- resources/views/projects/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer un Projet</title>
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
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Éditer le Projet</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $project->name) }}" required>
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description" class="form-control">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Date de Début :</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $project->start_date) }}">
                    </div>

                    <div class="form-group">
                        <label for="end_date">Date de Fin :</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', $project->end_date) }}">
                    </div>

                    <button type="submit" class="btn btn-success">Mettre à Jour</button>
                </form>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Retour à la Liste</a>
            </div>
        </div>
    </div>
</body>
</html>
