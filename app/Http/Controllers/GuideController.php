<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    // Afficher la liste des guides
    public function index()
    {
        $guides = Guide::all();
        return view('guide.index', compact('guides'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('guide.create');
    }

    // Sauvegarder un guide dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'experience_years' => 'required|integer',
            'email' => 'required|email|unique:guides,email',
            'phone' => 'required',
        ]);

        Guide::create($request->all());
        return redirect()->route('guides.index')->with('success', 'Guide créé avec succès.');
    }

    // Afficher les détails d'un guide
    public function show(Guide $guide)
    {
        return view('guide.show', compact('guide'));
    }

    // Afficher le formulaire d'édition d'un guide
    public function edit(Guide $guide)
    {
        return view('guide.edit', compact('guide'));
    }

    // Mettre à jour un guide dans la base de données
    public function update(Request $request, Guide $guide)
    {
        $request->validate([
            'name' => 'required',
            'experience_years' => 'required|integer',
            'email' => 'required|email|unique:guides,email,' . $guide->id,
            'phone' => 'required',
        ]);

        $guide->update($request->all());
        return redirect()->route('guides.index')->with('success', 'Guide mis à jour avec succès.');
    }

    // Supprimer un guide de la base de données
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('guides.index')->with('success', 'Guide supprimé avec succès.');
    }
}
