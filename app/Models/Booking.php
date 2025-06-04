<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     protected $fillable = [
        'room_type',
        'location',
        'price',
        'size',
        'start_date',
        'end_date',
        'total-days',
    ];
}
