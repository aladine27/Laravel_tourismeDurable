<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;


class FrontPageController extends Controller
{
    public function showFrontOffice()
    {
        // Fetch the first three trips and their associated traveler count
        $trips = Trip::withCount('travelers')->take(3)->get();
        
        // Pass the trips data to the front_office view
        return view('template.front_office', compact('trips'));
    }
}
