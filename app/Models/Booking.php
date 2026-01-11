<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
        protected $fillable = [
        'user_id',
        'bus_id',
        'passenger_name',
        'passenger_age',
        'seat_count',
        'seat_number',
        'journey_date',
    ];


    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
