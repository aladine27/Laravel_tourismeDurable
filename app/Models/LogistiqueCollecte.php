<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogistiqueCollecte extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = ['chauffeur', 'vehicle', 'route', 'collect_date', 'transporteur_id'];

    // A logistic collecte belongs to one transporteur
    public function transporteur()
    {
        return $this->belongsTo(Transporteur::class);
    }
}
