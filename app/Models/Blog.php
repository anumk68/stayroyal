<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  // app/Models/Blog.php
protected $fillable = [
    'title', 'slug', 'category_id', 'description', 'short_description',
    'meta_title', 'meta_description', 'meta_keyword',
    'image', 'image_alt', 'meta_image'
];
public function category() {
    return $this->belongsTo(Blogcategory::class);
}

}
