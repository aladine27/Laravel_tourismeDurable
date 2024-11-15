<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Restaurant;
use App\Models\Guide;


class FrontPageController extends Controller
{
    public function showFrontOffice()
    {
        // Fetch the first three trips and their associated traveler count
        $trips = Trip::withCount('travelers')->take(3)->get();
         $guides = Guide::with('tours')->get();

        // Fetch all restaurants
        $restaurants = Restaurant::all();
        // fetch all guides


        // Pass the trips and restaurants data to the front_office view
        return view('template.front_office', compact('trips', 'restaurants','guides'));
    }


    public function frontIndex()
{
    $guides = Guide::with('tours')->get(); // Fetch all guides with their associated tours
     $restaurants = Restaurant::all();
     $trips = Trip::all();
    return view('template.frontguide', compact('guides','restaurants','trips')); // Pass the guides variable to the view

}
 public function showToursByGuide($guideId)
    {
        $guide = Guide::with('tours')->findOrFail($guideId);
        return view('template.guide_tours', compact('guide'));
    }

}
