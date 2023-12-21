<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CategoryRequest;
use App\Services\CategoryService;


class CategoryController extends Controller
{   
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    } 

    public function index()
    {
        $categories = $this->categoryService->listAllCategories();

        return response()->json($categories);
    }

    public function show($id)
    {
        $category = $this->categoryService->listCategory($id);

        if (!$category) {
            return response()->json(["message" => "resource not found"], 404);
        }

        return response()->json($category);
    }

    public function store(CategoryRequest $request)
    {
        $response = $this->categoryService->createCategory($request->all());

        return response()->json($response);
    }

    public function update($id, CategoryRequest $request)
    {
        if (!$response = $this->categoryService->updateCategory($id, $request->all())) {
            return response()->json(["error" => "Action not taken"], 404);
        }

        return response()->json(["updated" => $response]);
    }

    public function destroy($id)
    {
        if (!$this->categoryService->deleteCategory($id)) {
            return response()->json(["error" => "Action not taken"], 404);
        }

        return response()->json(["deleted" => "true"], 204);
    }
}
