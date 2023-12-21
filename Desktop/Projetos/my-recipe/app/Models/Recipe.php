<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'image_id',
        'name',
        'ingredients',
        'preparation_method',
        'extra_note',
        'estimated_time',
        'people_served',
        'tips'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    } 
}
