<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Event;


class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('event')->get(); // Récupérer tous les tickets avec les événements associés
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $events = Event::all(); // Récupérer tous les événements
        return view('tickets.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'price' => 'required|numeric|min:0',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    public function edit(Ticket $ticket)
    {
        $events = Event::all(); // Récupérer tous les événements
        return view('tickets.edit', compact('ticket', 'events'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'price' => 'required|numeric|min:0',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}