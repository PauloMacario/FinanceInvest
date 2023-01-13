<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
