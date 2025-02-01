<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Événement</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: white;
            width: 50%;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #198754;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            text-align: left;
        }

        input, textarea {
            padding: 10px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #198754;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background-color: #145c32;
        }

        .back-link {
            display: block;
            margin-top: 15px;
            color: #198754;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Ajouter un Événement</h2>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <label for="title">Titre de l'événement :</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description :</label>
            <textarea id="description" name="description"></textarea>

            <label for="start_date">Date de début :</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">Date de fin :</label>
            <input type="date" id="end_date" name="end_date" required>

            <button type="submit">Ajouter l'Événement</button>
        </form>

        <a href="{{ route('calendar.show', ['year' => now()->year]) }}" class="back-link">← Retour au calendrier</a>
    </div>

</body>
</html>
