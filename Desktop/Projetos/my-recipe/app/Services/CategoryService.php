<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listAllCategories()
    {
        return $this->repository->getAllCategories();
    }

    public function listCategory(int $id)
    {
        return $this->repository->getCategory($id);
    }

    public function createCategory(array $data)
    {
        return $this->repository->newCategory($data);
    }

    public function updateCategory(int $id, array $data)
    {
        if (!$category = $this->listCategory($id)) {
            return false;
        }
        
        return $this->repository->updateCategory($category, $data);
    }

    public function deleteCategory(int $id)
    {
        if (!$category = $this->listCategory($id)) {
            return false;
        }

        return $this->repository->deleteCategory($category);
    }
}