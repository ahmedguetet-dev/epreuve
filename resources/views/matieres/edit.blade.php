
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une matière</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            color: #222;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .retour {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Modifier une matière</h1>

    <form action="{{ route('matieres.update', $matiere->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Code matière :</label>
        <input type="text" name="codemat"
               value="{{ $matiere->codemat }}" required>

        <label>Libellé :</label>
        <input type="text" name="libelle"
               value="{{ $matiere->libelle }}" required>

        <label>Coefficient :</label>
        <input type="number" name="coef"
               value="{{ $matiere->coef }}" required>

        <button type="submit">Modifier</button>
    </form>

    <a class="retour" href="{{ route('matieres.index') }}">
        Retour à la liste
    </a>

</div>

</body>
</html>
