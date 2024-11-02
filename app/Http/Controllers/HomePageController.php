<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function home()
    {
        // Assuming you have a 'restaurants' variable to pass to the view
        $restaurants = \App\Models\Restaurant::all();
        return view('home.home', compact('restaurants'));
    }
}