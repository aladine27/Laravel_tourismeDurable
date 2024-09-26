<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // N'oubliez pas d'importer le modèle Event

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string', // Ensure location is validated as a string
        ]);
    
        // Decode the JSON string to an array before saving
        $location = json_decode($request->location, true);
    
        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $location, // Store as an array
        ]);
    
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id); // Fetch the event by ID
        return view('events.show', compact('event')); // Pass the event to the view
    }

}
