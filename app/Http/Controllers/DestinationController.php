<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Models\Destination; // N'oubliez pas d'importer le modèle Destination

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Enregistre dans le dossier 'public/images'
        } else {
            $imagePath = null; // Ou gérer une valeur par défaut
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Sauvegarder le chemin de l'image
        ]);
    
        // Decode the JSON string to an array before saving
        $location = json_decode($request->location, true);
    
        Destination::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $location,
            'image' => $imagePath
        ]);
    
        return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
    }

    public function edit(Destination $destination)
{
    // Check if $destination->location is a string, if so decode it
    if (is_string($destination->location)) {
        $destination->location = json_decode($destination->location, true);
    }
    
    return view('destinations.edit', compact('destination'));
}


public function update(Request $request, Destination $destination)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|json',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $destination->name = $request->name;
    $destination->description = $request->description;

    // Handle location
    $destination->location = json_decode($request->location);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Remove the old image if necessary
        if ($destination->image) {
            Storage::delete($destination->image);
        }
        $path = $request->file('image')->store('destinations', 'public');
        $destination->image = $path;
    }

    $destination->save();

    return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
}

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    }

    public function show($id)
    {
        $destination = Destination::findOrFail($id); // Fetch the Destination by ID
        return view('destinations.show', compact('Destination')); // Pass the Destination to the view
    }

    public function getAttractions($destinationId)
    {
        $destination = Destination::find($destinationId);
    
        if (!$destination) {
            return response()->json(['error' => 'Destination not found'], 404);
        }
    
        $attractions = $destination->attractions; // Assurez-vous que la relation attractions existe
    
        return response()->json([
            'attractions' => $attractions
        ]);
    }
    
    public function showDestinationList()
    {
        // Récupérer toutes les destinations avec leurs attractions associées
        $destinations = Destination::with('attractions')->get();
    
        // Passer les destinations à la vue
        return view('template.destinations_list', compact('destinations'));
    }
    
    // SearchController.php
    public function search(Request $request)
{
    // Vérifiez si le type d'attraction a été envoyé
    $type = $request->input('type');

    // Si un type est spécifié, filtrez les destinations par type d'attraction
    if ($type && $type !== 'All') {
        $destinations = Destination::whereHas('attractions', function($query) use ($type) {
            $query->where('type', $type);
        })->with('attractions')->get(); // Inclure les attractions dans les résultats
    } else {
        // Sinon, récupérez toutes les destinations avec leurs attractions
        $destinations = Destination::with('attractions')->get();
    }

    return response()->json(['destinations' => $destinations]);
}


    

    
    
    


}
