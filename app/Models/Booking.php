<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['check_in_date', 'check_out_date', 'total_price', 'accommodation_id'];

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }
}
