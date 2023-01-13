<?php

use App\Http\Controllers\Api\RecipeController;

Route::prefix('/recipes')
->group(
    function () {
        Route::get('', [RecipeController::class, 'index'])
            ->name('recipe_index');
    }
);