<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';
    protected $fillable = ['name', 'address', 'cuisine_type', 'restaurant_image'];

    // Relation One-to-Many avec Menu
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}