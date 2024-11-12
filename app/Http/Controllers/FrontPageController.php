<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Restaurant;

class FrontPageController extends Controller
{
    public function showFrontOffice()
    {
        // Fetch the first three trips and their associated traveler count
        $trips = Trip::withCount('travelers')->take(3)->get();
        
        // Fetch all restaurants
        $restaurants = Restaurant::all();
        
        // Pass the trips and restaurants data to the front_office view
        return view('template.front_office', compact('trips', 'restaurants'));
    }
}