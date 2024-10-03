<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    // Display a listing of the restaurants
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('restaurants.index', compact('restaurants'));
    }

    // Show the form for creating a new restaurant
    public function create()
    {
        return view('restaurants.create');
    }

    // Store a newly created restaurant in the database
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'cuisine_type' => 'required|string|max:255',
            'restaurant_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the restaurant image upload
        $imagePath = null;
        if ($request->hasFile('restaurant_image')) {
            $imagePath = $request->file('restaurant_image')->store('photos', 'public');
        }

        // Create a new restaurant
        Restaurant::create([
            'name' => $request->name,
            'address' => $request->address,
            'cuisine_type' => $request->cuisine_type,
            'restaurant_image' => $imagePath,
        ]);

        return redirect()->route('restaurants.index')->with('success', 'Restaurant créé avec succès.');
    }

    // Display the specified restaurant
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('restaurants.show', compact('restaurant'));
    }

    // Show the form for editing the specified restaurant
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('restaurants.edit', compact('restaurant'));
    }

    // Update the specified restaurant in the database
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'cuisine_type' => 'required|string|max:255',
            'restaurant_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the restaurant and update its information
        $restaurant = Restaurant::findOrFail($id);

        // Handle the restaurant image upload
        if ($request->hasFile('restaurant_image')) {
            // Delete the old image if it exists
            if ($restaurant->restaurant_image) {
                Storage::disk('public')->delete($restaurant->restaurant_image);
            }
            $imagePath = $request->file('restaurant_image')->store('photos', 'public');
        } else {
            $imagePath = $restaurant->restaurant_image;
        }

        $restaurant->update([
            'name' => $request->name,
            'address' => $request->address,
            'cuisine_type' => $request->cuisine_type,
            'restaurant_image' => $imagePath,
        ]);

        return redirect()->route('restaurants.index')->with('success', 'Restaurant mis à jour avec succès.');
    }

    // Remove the specified restaurant from the database
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        // Delete the restaurant image if it exists
        if ($restaurant->restaurant_image) {
            Storage::disk('public')->delete($restaurant->restaurant_image);
        }

        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('success', 'Restaurant supprimé avec succès.');
    }

    // Redirect to menu show or create based on existence of menus
    public function redirectToMenu(Restaurant $restaurant)
    {
        if ($restaurant->menus()->exists()) {
            return redirect()->route('menus.show', $restaurant->menus->first()->id);
        } else {
            return redirect()->route('menus.create', ['restaurant' => $restaurant->id]);
        }
    }
}