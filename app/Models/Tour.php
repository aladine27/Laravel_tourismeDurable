<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    // Définir les champs pouvant être remplis en masse
    protected $fillable = [
        'title',
        'description',
        'date',
        'duration',
        'price',
        'nb_place', 
    ];

    /**
     * Relation Many-to-Many avec le modèle Guide
     */
    public function guides()
    {
        return $this->belongsToMany(Guide::class);
    }
}
