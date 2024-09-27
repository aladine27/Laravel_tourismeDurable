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
        $locations = $this->getLocations(); // Fetch locations
        return view('logistique_collectes.create', compact('transporteurs', 'locations'));
    }

    // Store a newly created logistic collecte in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'chauffeur' => 'required|string',
            'vehicle' => 'required|string',
            'collect_date' => 'required|date',
            'departure' => 'required|string',
            'arrival' => 'required|string',
            'transporteur_id' => 'required|exists:transporteurs,id',
        ]);

        LogistiqueCollecte::create($validatedData);
        return redirect()->route('logistique_collectes.index')->with('success', 'Collecte logistique créée avec succès.');
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
        $locations = $this->getLocations(); // Fetch locations
        return view('logistique_collectes.edit', compact('logistiqueCollecte', 'transporteurs', 'locations'));
    }

    // Update the specified logistic collecte in the database
    public function update(Request $request, LogistiqueCollecte $logistiqueCollecte)
    {
        $request->validate([
            'chauffeur' => 'required|string',
            'vehicle' => 'required|string',
            'collect_date' => 'required|date',
            'departure' => 'required|string',
            'arrival' => 'required|string',
            'transporteur_id' => 'required|exists:transporteurs,id',
        ]);

        $logistiqueCollecte->update($request->all());
        return redirect()->route('logistique_collectes.index')->with('success', 'Collecte logistique mise à jour avec succès.');
    }

    // Remove the specified logistic collecte from the database
    public function destroy(LogistiqueCollecte $logistiqueCollecte)
    {
        $logistiqueCollecte->delete();
        return redirect()->route('logistique_collectes.index')->with('success', 'Collecte logistique supprimée avec succès.');
    }

    // Fetch locations from a JSON file
    public function getLocations()
    {
        $filePath = storage_path('tunisian_locations.json');
        if (file_exists($filePath)) {
            $response = file_get_contents($filePath);
            $locations = json_decode($response, true); // Decode as associative array
            
            // Check for JSON errors
            if (json_last_error() !== JSON_ERROR_NONE) {
                return []; // Return an empty array on error
            }

            return $locations; // Return the array
        }

        return []; // Return an empty array if the file doesn't exist
    }
}
