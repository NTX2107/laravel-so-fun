<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\Interfaces\ICategoryService;

class CategoryController extends Controller
{
    private ICategoryService $categoryService;

    public function __construct(ICategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function getListCategories() {
        return $this->categoryService->findAll();
    }

    public function editCategory($id, CategoryRequest $request) {
        $validated = $request->validated();
        return $this->categoryService->update($id, $validated);
    }

    public function deleteCategory($id) {
        $this->categoryService->softDelete($id);
    }
}
