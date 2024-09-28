<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Traveler;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the trips.
     */
    public function index()
    {
        $trips = Trip::with('traveler')->get();
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new trip.
     */
    public function create()
    {
        $travelers = Traveler::all(); // Get all travelers to populate the dropdown
        return view('trips.create', compact('travelers'));
    }

    /**
     * Store a newly created trip in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'destination' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'cost' => 'required|numeric',
            'traveler_id' => 'required|exists:travelers,id'
        ]);

        Trip::create($request->all());

        return redirect()->route('gestionVoyage.index')->with('success', 'Voyage créé avec succès.');
    }

    /**
     * Show the form for editing the specified trip.
     */
    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        $travelers = Traveler::all(); // Get all travelers to allow changing the traveler
        return view('trips.edit', compact('trip', 'travelers'));
    }

    /**
     * Update the specified trip in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'destination' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'cost' => 'required|numeric',
            'traveler_id' => 'required|exists:travelers,id'
        ]);

        $trip = Trip::findOrFail($id);
        $trip->update($request->all());

        return redirect()->route('gestionVoyage.index')->with('success', 'Voyage mis à jour avec succès.');
    }

    /**
     * Remove the specified trip from storage.
     */
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('gestionVoyage.index')->with('success', 'Voyage supprimé avec succès.');
    }
}
