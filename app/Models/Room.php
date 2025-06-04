<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_type',
        'location',
        'price',
        'size',
        'room_image',
    ];
}
