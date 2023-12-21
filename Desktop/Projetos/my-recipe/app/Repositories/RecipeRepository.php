<?php

namespace App\Repositories;

use App\Models\Recipe;

class RecipeRepository
{
    protected $model;

    public function __construct(Recipe $recipe)
    {
        $this->model = $recipe;
    }

    public function getAllRecipes()
    {
        return $this->model::all();
    }

    public function getAllRecipesFull()
    {
        return $this->model::where('id', '>', 0)
            ->with('category', 'category.image', 'image')
            ->get();
    }

    public function getRecipe(int $id)
    {
        return $this->model::find($id);
    }

    public function getRecipeFull(int $id)
    {
        $recipe = $this->model::find($id)
            ->load('category', 'category.image', 'image');

        return $recipe;
    }

    public function newRecipe(array $data)
    {
        return $this->model::create($data);
    }

    public function updateRecipe(Recipe $recipe, array $data)
    {
        return $recipe->update($data);
    }

    public function deleteRecipe(Recipe $recipe)
    {
        return $recipe->delete();
    }    
}