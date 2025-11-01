<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;

    protected $table = 'faqs';

    protected $fillable = [
        'room_id',
        'question',
        'answer',
        'status'
    ];

    // Relationship with Roomtype
  public function roomtype()
{
    return $this->belongsTo(Room::class, 'room_id');
}

}
