<?php

namespace App\Http\Controllers;

use App\Models\Transporteur;
use Illuminate\Http\Request;

class TransporteurController extends Controller
{
    // Display a listing of the transporteurs
    public function index()
    {
        $transporteurs = Transporteur::all();
        return view('transporteurs.index', compact('transporteurs'));
    }

    // Show the form for creating a new transporteur
    public function create()
    {
        return view('transporteurs.create');
    }

    // Store a newly created transporteur in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_name' => 'nullable',
            'phone' => 'required',
            'email' => 'required|email|unique:transporteurs'
        ]);

        Transporteur::create($request->all());
        return redirect()->route('transporteurs.index')->with('success', 'Transporteur created successfully.');
    }

    // Display the specified transporteur
    public function show(Transporteur $transporteur)
    {
        return view('transporteurs.show', compact('transporteur'));
    }

    // Show the form for editing the specified transporteur
    public function edit(Transporteur $transporteur)
    {
        return view('transporteurs.edit', compact('transporteur'));
    }

    // Update the specified transporteur in the database
    public function update(Request $request, Transporteur $transporteur)
    {
        $request->validate([
            'name' => 'required',
            'company_name' => 'nullable',
            'phone' => 'required',
            'email' => 'required|email|unique:transporteurs,email,' . $transporteur->id
        ]);

        $transporteur->update($request->all());
        return redirect()->route('transporteurs.index')->with('success', 'Transporteur updated successfully.');
    }

    // Remove the specified transporteur from the database
    public function destroy(Transporteur $transporteur)
    {
        $transporteur->delete();
        return redirect()->route('transporteurs.index')->with('success', 'Transporteur deleted successfully.');
    }
}
