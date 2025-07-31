<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    use Illuminate\Support\Carbon;

class Booking extends Model
{
     protected $fillable = [
        'room_type',
        'location',
        'price',
        'size',
        'start_date',
        'end_date',
        'total_days',
        'user_id',
        'room_id',
        'adults',
        'children',
        'infants',
        'extra_beds',

    ];


protected $casts = [
    'start_date' => 'date',
    'end_date' => 'date',
];

    public function room()
{
    return $this->belongsTo(Room::class, 'room_id');
}
}
