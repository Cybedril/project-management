<!-- resources/views/projects/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Nouveau Projet</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Créer un Nouveau Projet</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Date de Début :</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                    </div>

                    <div class="form-group">
                        <label for="end_date">Date de Fin :</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Créer</button>
                </form>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Retour à la Liste</a>
            </div>
        </div>
    </div>
</body>
</html>
