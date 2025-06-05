<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{     
      protected $fillable = [
        'rating',
        'comment',
        'approved',
        'status',
        'user_id',
        'room_id',
      ];
}
