<?php

namespace App\Http\Controllers;

use App\Models\LogistiqueCollecte;
use App\Models\Transporteur;
use Illuminate\Http\Request;

class LogistiqueCollecteController extends Controller
{
    // Display a listing of logistic collectes with their associated transporteur
    public function index()
    {
        $logistiqueCollectes = LogistiqueCollecte::with('transporteur')->get();
        return view('logistique_collectes.index', compact('logistiqueCollectes'));
    }

    // Show the form for creating a new logistic collecte
    public function create()
    {
        $transporteurs = Transporteur::all();
        return view('logistique_collectes.create', compact('transporteurs'));
    }

    // Store a newly created logistic collecte in the database
    public function store(Request $request)
    {
        $request->validate([
            'chauffeur' => 'required',
            'vehicle' => 'required',
            'route' => 'required',
            'collect_date' => 'required|date',
            'transporteur_id' => 'required|exists:transporteurs,id'
        ]);

        LogistiqueCollecte::create($request->all());
        return redirect()->route('logistique_collectes.index')->with('success', 'Logistique Collecte created successfully.');
    }

    // Display the specified logistic collecte
    public function show(LogistiqueCollecte $logistiqueCollecte)
    {
        return view('logistique_collectes.show', compact('logistiqueCollecte'));
    }

    // Show the form for editing the specified logistic collecte
    public function edit(LogistiqueCollecte $logistiqueCollecte)
    {
        $transporteurs = Transporteur::all();
        return view('logistique_collectes.edit', compact('logistiqueCollecte', 'transporteurs'));
    }

    // Update the specified logistic collecte in the database
    public function update(Request $request, LogistiqueCollecte $logistiqueCollecte)
    {
        $request->validate([
            'chauffeur' => 'required',
            'vehicle' => 'required',
            'route' => 'required',
            'collect_date' => 'required|date',
            'transporteur_id' => 'required|exists:transporteurs,id'
        ]);

        $logistiqueCollecte->update($request->all());
        return redirect()->route('logistique_collectes.index')->with('success', 'Logistique Collecte updated successfully.');
    }

    // Remove the specified logistic collecte from the database
    public function destroy(LogistiqueCollecte $logistiqueCollecte)
    {
        $logistiqueCollecte->delete();
        return redirect()->route('logistique_collectes.index')->with('success', 'Logistique Collecte deleted successfully.');
    }
}
