<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{    
    public function index()
    {
        $recipes = Recipe::where('id', '>', 0)
            ->with('category', 'category.image', 'image')
            ->get();

        return response()->json($recipes);
    }
}
