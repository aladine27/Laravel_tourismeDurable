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
    // Display tours for clients as cards
    public function clientIndex()
    {
        $tours = Tour::all(); // Fetch all tours
        return view('tours.client.index', compact('tours'));
    }

    // Handle participation in a tour
    public function participate($id)
    {
        $tour = Tour::findOrFail($id);

        if ($tour->nb_place > 0) {
            // Decrease the number of available places
            $tour->nb_place--;
            $tour->save();

            return redirect()->route('tours.client.index')->with('success', 'You have successfully registered for the tour.');
        } else {
            return redirect()->route('tours.client.index')->with('error', 'No available spots for this tour.');
        }
    }
    // TourController


}
