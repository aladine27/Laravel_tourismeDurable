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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', 
        ]);

        // Gérer l'upload de l'image
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('guides', 'public');
    } else {
        $imagePath = null;
    }

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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($guide->image) {
            Storage::delete('public/' . $guide->image);
        }
        $imagePath = $request->file('image')->store('guides', 'public');
    } else {
        $imagePath = $guide->image; // Conserver l'ancienne image si aucune nouvelle image n'est chargée
    }

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
