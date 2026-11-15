<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des épreuves</title>

    <style>
      body {
    font-family: Arial, sans-serif;
    background: #f4f6f8;
    padding: 40px;
}

.container {
    max-width: 900px;
    margin: auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #222;
}

h2 {
    margin-bottom: 15px;
    color: #333;
}

form {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 40px;
    padding: 20px;
    background: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 8px;
}

input, select {
    flex: 1;
    min-width: 130px;
    padding: 11px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 11px 22px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #1d4ed8;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    background: white;
}

th, td {
    border: 1px solid #ddd;
    padding: 14px;
    text-align: center;
}

th {
    background: #2563eb;
    color: white;
}

tr:nth-child(even) {
    background: #f8f9fa;
}
    </style>
</head>

<body>

<div class="container">

    <h1>Liste des épreuves</h1>
    <h2>Ajouter une épreuve</h2>

<form action="{{ url('/epreuves') }}" method="POST">
    @csrf

    <input type="text" name="numepreuve" placeholder="Numéro épreuve">

    <input type="date" name="datepreuve">

    <input type="text" name="lieu" placeholder="Lieu">

    <select name="matiere_id">
        <option value="">Choisir une matière</option>

        @foreach($matieres as $matiere)
            <option value="{{ $matiere->id }}">
                {{ $matiere->libelle }}
            </option>
        @endforeach
    </select>

    <button type="submit">Ajouter</button>
</form>

    <table>

        <tr>
            <th>Numéro</th>
            <th>Date</th>
            <th>Lieu</th>
            <th>Matière id</th>
        </tr>

        @foreach($epreuves as $epreuve)

        <tr>
            <td>{{ $epreuve->numepreuve }}</td>
            <td>{{ $epreuve->datepreuve }}</td>
            <td>{{ $epreuve->lieu }}</td>
            <td>{{ $epreuve->matiere_id }}</td>
        </tr>

        @endforeach

    </table>

</div>

</body>
</html>