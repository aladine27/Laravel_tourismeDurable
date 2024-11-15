<?php

namespace App\Http\Controllers;

use App\Models\Traveler;
use Illuminate\Http\Request;

class TravelerController extends Controller
{
    public function index()
    {
        $travelers = Traveler::all();
        return view('travelers.index', compact('travelers'));
    }

    public function create()
    {
        return view('travelers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:travelers',
        ]);

        Traveler::create($request->all());

        return redirect()->route('gestionVoyageur.index');
    }

    public function show(Traveler $traveler)
    {
        return view('travelers.show', compact('traveler'));
    }

    public function edit($id)
    {
        // Récupérer le voyageur à modifier
        $traveler = Traveler::findOrFail($id);
    
        // Afficher la vue d'édition avec les données du voyageur
        return view('travelers.edit', compact('traveler'));
    }
    public function update(Request $request, $id)
    {
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'preferences' => 'nullable|string',
    ]);

    // Récupérer le voyageur à mettre à jour
    $traveler = Traveler::findOrFail($id);

    // Mettre à jour les données du voyageur
    $traveler->update($validatedData);

    // Rediriger vers la liste des voyageurs avec un message de succès
    return redirect()->route('gestionVoyageur.index')->with('success', 'Voyageur mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Récupérer le voyageur à supprimer
        $traveler = Traveler::findOrFail($id);
    
        // Supprimer le voyageur
        $traveler->delete();
    
        // Rediriger vers la liste des voyageurs avec un message de succès
        return redirect()->route('gestionVoyageur.index')->with('success', 'Voyageur supprimé avec succès.');
    }
}
