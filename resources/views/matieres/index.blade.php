
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des matières</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h1, h2 {
            text-align: center;
            color: #222;
        }

        form {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 30px;
            padding: 20px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        input {
            flex: 1;
            min-width: 130px;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button, .btn {
            padding: 9px 14px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        button {
            background: #2563eb;
        }

        .show { background: #16a34a; }
        .edit { background: #d97706; }
        .delete { background: #dc2626; }

        table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: white;
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    border: 1px solid #ddd;
    padding: 14px;
    text-align: center;
}

th {
    background: #2563eb;
    color: white;
    font-weight: bold;
}

tr:nth-child(even) {
    background: #f8f9fa;
}

tr:hover {
    background: #eaf1ff;
}

.actions {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
}

.actions form {
    margin: 0;
    padding: 0;
    border: none;
    background: none;
}
    </style>
</head>

<body>

<div class="container">

    <h1>Gestion des matières</h1>

    <h2>Ajouter une matière</h2>

    <form action="{{ route('matieres.store') }}" method="POST">
        @csrf

        <input type="text" name="codemat" placeholder="Code matière" required>
        <input type="text" name="libelle" placeholder="Libellé" required>
        <input type="number" name="coef" placeholder="Coefficient" required>

        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des matières</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Code matière</th>
            <th>Libellé</th>
            <th>Coefficient</th>
            <th>Actions</th>
        </tr>

        @foreach($matieres as $matiere)
        <tr>
            <td>{{ $matiere->id }}</td>
            <td>{{ $matiere->codemat }}</td>
            <td>{{ $matiere->libelle }}</td>
            <td>{{ $matiere->coef }}</td>

            <td>
                <div class="actions">

                    <a class="btn show"
                       href="{{ route('matieres.show', $matiere->id) }}">
                        Voir
                    </a>

                    <a class="btn edit"
                       href="{{ route('matieres.edit', $matiere->id) }}">
                        Modifier
                    </a>

                    <form action="{{ route('matieres.destroy', $matiere->id) }}"
                          method="POST"
                          onsubmit="return confirm('Voulez-vous supprimer cette matière ?')">
                        @csrf
                        @method('DELETE')

                        <button class="delete" type="submit">
                            Supprimer
                        </button>
                    </form>

                </div>
            </td>
        </tr>
        @endforeach

    </table>

</div>

</body>
</html>
