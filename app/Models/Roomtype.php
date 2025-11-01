<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    protected $fillable = [
        'category_id',
        'room_type',
        'status',
        'slug'
    ];
    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type','id');
    }
    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id');
    }
    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'category_id', 'id');
    }

}
