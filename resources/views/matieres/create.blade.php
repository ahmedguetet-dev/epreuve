
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une matière</title>
</head>
<body>

    <h1>Ajouter une matière</h1>

    <form action="{{ route('matieres.store') }}" method="POST">
        @csrf

        <label>Code matière :</label>
        <input type="text" name="codemat" required>

        <br><br>

        <label>Libellé :</label>
        <input type="text" name="libelle" required>

        <br><br>

        <label>Coefficient :</label>
        <input type="number" name="coef" required>

        <br><br>

        <button type="submit">Ajouter</button>
    </form>

    <br>
    <a href="{{ route('matieres.index') }}">Retour</a>

</body>
</html>
