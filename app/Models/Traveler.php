<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'preferences'];

    public function trips()
    {
        // return $this->hasMany(Trip::class);
        return $this->belongsToMany(Trip::class, 'trip_travelers');
    }
}
