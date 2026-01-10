<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'bus_name',
        'from_city',
        'to_city',
        'departure_time',
        'price',
        'total_seats',
    ];
}
