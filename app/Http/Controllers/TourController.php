<?php
namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::all();
        return view('tours.index', compact('tours'));
    }

    public function create()
    {
        return view('tours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'price' => 'required|integer',
             'nb_place' => 'required|integer',
        ]);

        Tour::create($request->all());
        return redirect()->route('tours.index')->with('success', 'Tour créé avec succès.');
    }

    public function edit(Tour $tour)
    {
        return view('tours.edit', compact('tour'));
    }

    public function update(Request $request, Tour $tour)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'price' => 'required|integer',
             'nb_place' => 'required|integer',
        ]);

        $tour->update($request->all());
        return redirect()->route('tours.index')->with('success', 'Tour mis à jour avec succès.');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('tours.index')->with('success', 'Tour supprimé avec succès.');
    }
 public function clientIndex()
    {
        // Récupérer tous les tours avec nb_place > 0
        $tours = Tour::where('nb_place', '>', 0)->get();
        return view('tours.clientIndex', compact('tours'));
    }

    public function reserve(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        if ($tour->nb_place > 0) {
            $tour->nb_place--;
            $tour->save();

            return redirect()->route('tours.client.index')->with('success', 'Inscription réussie au tour.');
        }

        return redirect()->route('tours.client.index')->with('error', 'Aucune place disponible.');
    }
    public function show($id)
{
    $tour = Tour::findOrFail($id);
    return view('tours.show', compact('tour'));
}


    


}
