<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    // Définir les champs pouvant être remplis en masse
    protected $fillable = [
        'name',
        'experience_years',
        'email',
        'phone',
    ];

    /**
     * Relation Many-to-Many avec le modèle Tour
     */
    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }
}
