<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Traveler;
use Illuminate\Http\Request;
use PDF; // Make sure to import the PDF facade


class TripController extends Controller
{
    /**
     * Display a listing of the trips.
     */
    public function index()
    {
        $trips = Trip::with('travelers')->get();
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
            // 'traveler_id' => 'required|exists:travelers,id'
            'traveler_ids' => 'required|array', // Ensure traveler_ids is an array for multiple selection
            'traveler_ids.*' => 'exists:travelers,id' // Validate each traveler ID exists
        ]);

        $trip = Trip::create($request->all());
        // Attach the selected travelers to the trip
        $trip->travelers()->attach($request->traveler_ids);
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
            // 'traveler_id' => 'required|exists:travelers,id'
            'traveler_ids' => 'required|array', // Ensure traveler_ids is an array for multiple selection
            'traveler_ids.*' => 'exists:travelers,id' // Validate each traveler ID exists
        ]);

        // $trip = Trip::findOrFail($id);
        // $trip->update($request->all());
        // return redirect()->route('gestionVoyage.index')->with('success', 'Voyage mis à jour avec succès.');
        
        // Find the trip
        $trip = Trip::findOrFail($id);

        // Update the trip
        $trip->update([
            'destination' => $request->input('destination'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'cost' => $request->input('cost'),
        ]);

        // Sync the selected travelers with the trip
        $trip->travelers()->sync($request->input('traveler_ids'));

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

    public function showTripsList()
    {
        // Fetch all trips with their associated traveler count
        $trips = Trip::withCount('travelers')->get();
        
        // Pass the trips data to the trips list view
        return view('template.trips_list', compact('trips'));
    }

// TripController.php
public function print()
{
    // Logic to generate and download the PDF
    // Example using a package like DomPDF
    $trips = Trip::all(); // Or fetch the data you need for the PDF
    
    $pdf = \PDF::loadView('trips.pdf', compact('trips')); // Ensure 'trips.pdf' view is created
    return $pdf->download('trips-list.pdf');
}


}
