<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Tour;
use Illuminate\Http\Request;

class GuideTourController extends Controller
{
    // Afficher la liste des affectations de guides aux tours
    public function index()
    {
        $assignments = Tour::with('guides')->get(); // Récupérer les tours avec les guides associés
        $guides = Guide::all(); // Récupérer tous les guides
        return view('guidetour.index', compact('assignments', 'guides'));
    }

    // Afficher le formulaire d'ajout d'affectation
    public function create()
    {
        $guides = Guide::all();
        $tours = Tour::all();
        return view('guidetour.create', compact('guides', 'tours'));
    }

    // Enregistrer une nouvelle affectation
    public function store(Request $request)
    {
        $request->validate([
            'guides' => 'required|array',
            'guides.*' => 'exists:guides,id',
            'tours' => 'required|exists:tours,id',
        ]);

        $tour = Tour::findOrFail($request->tours);
        $tour->guides()->sync($request->guides);

        return redirect()->route('guidetours.index')->with('success', 'Les guides ont été affectés au tour.');
    }

    // Afficher le formulaire d'édition d'affectation
    public function edit($id)
    {
        $assignment = Tour::with('guides')->findOrFail($id);
        $guides = Guide::all();
        $tours = Tour::all();
        return view('guidetour.edit', compact('assignment', 'guides', 'tours'));
    }

    // Mettre à jour l'affectation
    public function update(Request $request, $id)
    {
        $request->validate([
            'guides' => 'required|array',
            'guides.*' => 'exists:guides,id',
            'tours' => 'required|exists:tours,id',
        ]);

        $tour = Tour::findOrFail($id);
        $tour->guides()->sync($request->guides);

        return redirect()->route('guidetours.index')->with('success', 'Les guides ont été mis à jour pour le tour.');
    }

    // Supprimer l'affectation
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->guides()->detach();
        return redirect()->route('guidetours.index')->with('success', 'Les guides ont été supprimés de la visite.');
    }
// Controller method for displaying tours to clients
// GuideTourController
public function clientIndex()
{
    // Use paginate() to enable pagination
    $tours = Tour::with('guides')->paginate(6); // Display 6 tours per page
    return view('guidetour.indexclient', compact('tours'));
}



}
