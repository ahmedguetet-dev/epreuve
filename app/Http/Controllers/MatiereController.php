<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatiereController extends Controller
{
    // Afficher la liste des matières
    public function index()
    {
        $matieres = DB::select('SELECT * FROM matieres');

        return view('matieres.index', compact('matieres'));
    }

    public function create()
    {
        return view('matieres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codemat' => 'required',
            'libelle' => 'required',
            'coef' => 'required|numeric',
        ]);

        DB::insert(
            'INSERT INTO matieres (codemat, libelle, coef) VALUES (?, ?, ?)',
            [$request->codemat, $request->libelle, $request->coef]
        );

        return redirect()->route('matieres.index');
    }

    public function show(string $id)
    {
        $matiere = DB::selectOne(
            'SELECT * FROM matieres WHERE id = ?',
            [$id]
        );

        return view('matieres.show', compact('matiere'));
    }

    public function edit(string $id)
    {
        $matiere = DB::selectOne(
            'SELECT * FROM matieres WHERE id = ?',
            [$id]
        );

        return view('matieres.edit', compact('matiere'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'codemat' => 'required',
            'libelle' => 'required',
            'coef' => 'required|numeric',
        ]);

        DB::update(
            'UPDATE matieres SET codemat = ?, libelle = ?, coef = ? WHERE id = ?',
            [$request->codemat, $request->libelle, $request->coef, $id]
        );

        return redirect()->route('matieres.index');
    }

    public function destroy(string $id)
    {
        DB::delete('DELETE FROM matieres WHERE id = ?', [$id]);

        return redirect()->route('matieres.index');
    }
}
