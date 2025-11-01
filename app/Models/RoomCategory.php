<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    //
    protected $fillable = [
        'category',
        'status',
    ];
    public function roomTypes()
    {
        return $this->hasMany(Roomtype::class, 'category_id', 'id');
    }

}
