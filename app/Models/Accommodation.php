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
}
