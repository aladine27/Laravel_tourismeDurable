<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::all();
        return view('accommodations.index', compact('accommodations'));
    }

    public function create()
    {
        return view('accommodations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'price_per_night' => 'required|integer',
        ]);

        Accommodation::create([
            'name' => $request->name,
            'address' => $request->address,
            'price_per_night' => $request->price_per_night,
        ]);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation created successfully.');
    }

    public function edit(Accommodation $accommodation)
    {
        return view('accommodations.edit', compact('accommodation'));
    }

    public function update(Request $request, Accommodation $accommodation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'price_per_night' => 'required|integer',
        ]);

        $accommodation->update([
            'name' => $request->name,
            'address' => $request->address,
            'price_per_night' => $request->price_per_night,
        ]);

        return redirect()->route('accommodations.index')->with('success', 'Accommodation updated successfully.');
    }

    public function destroy(Accommodation $accommodation)
    {
        $accommodation->delete();
        return redirect()->route('accommodations.index')->with('success', 'Accommodation deleted successfully.');
    }

    public function show($id)
    {
        $accommodation = Accommodation::findOrFail($id);
        return view('accommodations.show', compact('accommodation'));
    }
}
