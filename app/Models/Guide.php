<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    // Table associée à ce modèle
    protected $table = 'guides';

    // Les attributs qui peuvent être remplis via un formulaire
    protected $fillable = [
        'name',
        'experience_years',
        'email',
        'phone',
        'image',
    ];

    // Relation Many-to-Many avec Tour
    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }
}
