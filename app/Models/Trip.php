<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    // protected $fillable = ['destination', 'start_date', 'end_date', 'cost', 'traveler_id'];
    protected $fillable = ['destination', 'start_date', 'end_date', 'cost'];

    public function travelers()
    {
        // return $this->belongsTo(Traveler::class);
        return $this->belongsToMany(Traveler::class, 'trip_travelers');
    }
}
