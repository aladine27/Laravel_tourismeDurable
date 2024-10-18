<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Accommodation;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('accommodation')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $accommodations = Accommodation::all(); // For selecting accommodation
        return view('bookings.create', compact('accommodations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'total_price' => 'required|integer',
            'accommodation_id' => 'required|exists:accommodations,id',
        ]);

        Booking::create([
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $request->total_price,
            'accommodation_id' => $request->accommodation_id,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function edit(Booking $booking)
    {
        $accommodations = Accommodation::all(); // Fetch all accommodations
        return view('bookings.edit', compact('booking', 'accommodations'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after_or_equal:check_in_date',
            'total_price' => 'required|integer',
            'accommodation_id' => 'required|exists:accommodations,id',
        ]);

        // Update booking details
        $booking->update([
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'total_price' => $request->total_price,
            'accommodation_id' => $request->accommodation_id,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
