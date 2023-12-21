<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getAllCategories()
    {
        return $this->model::all();
    }

    public function getCategory(int $id)
    {
        return $this->model::find($id);
    }

    public function newCategory(array $data)
    {
        return $this->model::create($data);
    }

    public function updateCategory(Category $category, array $data)
    {
        return $category->update($data);
    }

    public function deleteCategory(Category $category)
    {
        return $category->delete();
    }    
}