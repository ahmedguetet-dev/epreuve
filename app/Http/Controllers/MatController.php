<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatController extends Controller
{
    public function index()
    {
        $matieres = collect(DB::select('SELECT * FROM matieres'));

        foreach (session('new_matieres', []) as $matiere) {
            $matieres->push((object) $matiere);
        }

        return view('matieres.index', compact('matieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codemat' => 'required|max:5',
            'libelle' => 'required',
            'coef' => 'required|numeric|between:1,5',
        ]);

        session()->push('new_matieres', [
    'id' => 'new_' . uniqid(),
    'codemat' => $request->codemat,
    'libelle' => $request->libelle,
    'coef' => $request->coef
]);

        return redirect('/matieres');
    }
}