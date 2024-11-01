<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    protected $fillable = ['name', 'address', 'price_per_night'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    protected $casts = [
        'address' => 'array', // This will ensure it's stored as JSON in the database
    ];



    // Accessor for latitude
    public function getLatitudeAttribute()
    {
        return $this->address['lat'] ?? null; // Return null if lat is not set
    }

    // Accessor for longitude
    public function getLongitudeAttribute()
    {
        return $this->address['lng'] ?? null; // Return null if lng is not set
    }

    // Method to get address from lat/lng (you can use Nominatim or any other geocoding service)
    public function getAddress()
    {
        $latitude = $this->latitude;
        $longitude = $this->longitude;

        if ($latitude && $longitude) {
            $url = "https://nominatim.openstreetmap.org/reverse?lat={$latitude}&lon={$longitude}&format=json";

            // Initialize a cURL session
            $ch = curl_init($url);

            // Set options
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'User-Agent: YourAppName/1.0 (your_email@example.com)' // Your application name and contact
            ]);

            // Execute the request
            $response = curl_exec($ch);
            curl_close($ch);

            // Decode the response
            $data = json_decode($response, true);
            return $data['display_name'] ?? 'Location not found';
        }

        return 'Location not found'; // Fallback if lat/lng are missing
    }
}
