<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'destination_id', // Clé étrangère vers Destination
    ];

    /**
     * Relation Many-to-One avec Destination.
     * Une attraction appartient à une seule destination.
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
