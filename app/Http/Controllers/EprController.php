<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EprController extends Controller
{
    public function index()
    {
        $epreuves = collect(DB::select('SELECT * FROM epreuves'));

        foreach (session('new_epreuves', []) as $epreuve) {
            $epreuves->push((object) $epreuve);
        }

        $matieres = collect(DB::select('SELECT * FROM matieres'));

        $newMatieres = session('new_matieres', []);

        foreach ($newMatieres as $key => &$matiere) {
            if (!isset($matiere['id'])) {
                $matiere['id'] = 'new_' . $key;
            }

            $matieres->push((object) $matiere);
        }

        unset($matiere);
        session(['new_matieres' => $newMatieres]);

        return view('epreuves.index', compact('epreuves', 'matieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numepreuve' => 'required',
            'datepreuve' => 'required|date',
            'lieu' => 'required',
            'matiere_id' => 'required',
        ]);

        $matiereExiste = DB::table('matieres')
            ->where('id', $request->matiere_id)
            ->exists();

        foreach (session('new_matieres', []) as $matiere) {
            if ((string) $matiere['id'] === (string) $request->matiere_id) {
                $matiereExiste = true;
            }
        }

        if (!$matiereExiste) {
            return back()->withErrors([
                'matiere_id' => 'Veuillez choisir une matière valide.'
            ])->withInput();
        }

        session()->push('new_epreuves', [
            'id' => 'new_' . uniqid(),
            'numepreuve' => $request->numepreuve,
            'datepreuve' => $request->datepreuve,
            'lieu' => $request->lieu,
            'matiere_id' => $request->matiere_id
        ]);

        return redirect('/epreuves');
    }
}