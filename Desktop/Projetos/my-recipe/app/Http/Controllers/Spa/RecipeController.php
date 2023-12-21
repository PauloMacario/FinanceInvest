<?php

namespace App\Http\Controllers\Spa;

use App\Http\Controllers\Controller;
use App\Services\RecipeService;
use Illuminate\Http\Request;

use Inertia\Inertia;
class RecipeController extends Controller
{
    protected $recipeService;

    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    public function index()
    {
        $recipes = $this->recipeService->listAllRecipesFull();

        return Inertia::render('Recipes/Recipes', [
            'recipes' => $recipes
        ]);
    }

    public function show()
    {
        return Inertia::render('Recipes/Recipe');
    }

}
