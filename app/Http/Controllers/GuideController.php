<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import the Storage facade

class GuideController extends Controller
{
    // Display the list of guides
    public function index()
    {
        $guides = Guide::all();
        return view('guide.index', compact('guides'));
    }

    // Display the creation form
    public function create()
    {
        return view('guide.create');
    }

    // Save a guide to the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'experience_years' => 'required|integer',
            'email' => 'required|email|unique:guides,email',
            'phone' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/guides');
            $data['image'] = str_replace('public/', '', $imagePath); // Store the relative path
        } else {
            $data['image'] = null;
        }

        // Create the guide with the image path included
        Guide::create(array_merge($request->all(), ['image' => $data['image']]));

        return redirect()->route('guides.index')->with('success', 'Guide created successfully.');
    }

    // Display guide details
    public function show(Guide $guide)
    {
        return view('guide.show', compact('guide'));
    }

    // Display the edit form for a guide
    public function edit(Guide $guide)
    {
        return view('guide.edit', compact('guide'));
    }

    // Update a guide in the database
    public function update(Request $request, Guide $guide)
    {
        $request->validate([
            'name' => 'required',
            'experience_years' => 'required|integer',
            'email' => 'required|email|unique:guides,email,' . $guide->id,
            'phone' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($guide->image) {
                Storage::delete('public/' . $guide->image);
            }
            $imagePath = $request->file('image')->store('public/guides');
            $data['image'] = str_replace('public/', '', $imagePath);
        } else {
            $data['image'] = $guide->image; // Keep the old image if no new image is uploaded
        }

        // Update the guide with the new or existing image path
        $guide->update(array_merge($request->all(), ['image' => $data['image']]));

        return redirect()->route('guides.index')->with('success', 'Guide updated successfully.');
    }

    // Delete a guide from the database
    public function destroy(Guide $guide)
    {
        // Delete the guide's image if it exists
        if ($guide->image) {
            Storage::delete('public/' . $guide->image);
        }

        $guide->delete();
        return redirect()->route('guides.index')->with('success', 'Guide deleted successfully.');
    }
}
