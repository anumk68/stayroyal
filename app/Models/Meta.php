<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'meta_title',
        'value',
        'meta_type_id',
     ];
}
