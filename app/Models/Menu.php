<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'restaurant_id',
        'photo',               // Photo of the menu
        'created_at',          // Auto-managed by Laravel
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // Accessor to get the restaurant name easily
    public function getRestaurantNameAttribute()
    {
        return $this->restaurant->name;
    }
}
