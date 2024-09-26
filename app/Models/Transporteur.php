<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporteur extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = ['name', 'company_name', 'phone', 'email'];

    // A transporteur can have many logistic collectes
    public function logistiqueCollectes()
    {
        return $this->hasMany(LogistiqueCollecte::class);
    }
}
