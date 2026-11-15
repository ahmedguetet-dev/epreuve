
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails matière</title>

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

        .info {
            padding: 15px;
            margin-bottom: 12px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .info strong {
            color: #2563eb;
        }

        .retour {
            display: block;
            text-align: center;
            margin-top: 25px;
            padding: 12px;
            background: #2563eb;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .retour:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Détails de la matière</h1>

    <div class="info">
        <strong>ID :</strong> {{ $matiere->id }}
    </div>

    <div class="info">
        <strong>Code matière :</strong> {{ $matiere->codemat }}
    </div>

    <div class="info">
        <strong>Libellé :</strong> {{ $matiere->libelle }}
    </div>

    <div class="info">
        <strong>Coefficient :</strong> {{ $matiere->coef }}
    </div>

    <a class="retour" href="{{ route('matieres.index') }}">
        Retour à la liste
    </a>

</div>

</body>
</html>
