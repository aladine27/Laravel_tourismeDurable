<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $menus = Menu::with('restaurant')->get();
        return view('menus.index', compact('menus'));
    }

    // Show the form for creating a new resource
    public function create(Request $request)
    {
        // Get all restaurants that do not have a menu
        $restaurants = Restaurant::doesntHave('menus')->get();
    
        return view('menus.create', compact('restaurants'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'menu_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle the file upload
        if ($request->hasFile('menu_image')) {
            $file = $request->file('menu_image');

            if ($file->isValid()) {
                $path = $file->store('public/photos');
                $data['photo'] = str_replace('public/', '', $path);
            } else {
                return back()->withErrors('File upload failed.');
            }
        }

        Menu::create($data);

        return redirect()->route('menus.index')->with('success', 'Menu created successfully.');
    }

    // Show the form for editing the specified resource
    public function edit(Menu $menu)
    {
        $restaurants = Restaurant::all();
        return view('menus.edit', compact('menu', 'restaurants'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'menu_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('menu_image')) {
            // Delete the old photo if it exists
            if ($menu->photo) {
                Storage::delete('public/' . $menu->photo);
            }

            $file = $request->file('menu_image');
            if ($file->isValid()) {
                $path = $file->store('public/photos');
                $data['photo'] = str_replace('public/', '', $path);
            } else {
                return back()->withErrors('File upload failed.');
            }
        }

        $menu->update($data);

        return redirect()->route('menus.index')->with('success', 'Menu updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Menu $menu)
    {
        if ($menu->photo) {
            Storage::delete('public/' . $menu->photo);
        }

        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully.');
    }


    // Show the specified resource
public function show(Menu $menu)
{
    return view('menus.show', compact('menu'));
}

}
