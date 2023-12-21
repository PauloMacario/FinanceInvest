<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'extension',
        'path',
        'icon',
    ];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
