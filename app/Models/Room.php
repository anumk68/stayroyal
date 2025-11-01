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
        'slug',
        'description',
        'schema_seo'
    ];

    public function roomType()
    {
        return $this->belongsTo(Roomtype::class, 'room_type');
    }
    public function room()
    {
        return $this->belongsTo(Roomtype::class, 'room_type');
    }

    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id');
    }
}
