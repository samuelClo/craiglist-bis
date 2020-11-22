<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Article extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function scopeIsPublished($query) {
        return $query->where('is_published', true);
    }
}
