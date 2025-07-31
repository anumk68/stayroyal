<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
   protected $fillable = [
    'room_type_id',
    'offer_price',
    'offer_valid_time',
    'after_discount_price',
    'status',
    'slug'
];

public function roomType()
{
    return $this->belongsTo(Roomtype::class);
}
public function room()
{
    return $this->hasOne(Room::class, 'room_type', 'room_type_id')
                ->where('status', 1);
}

}
