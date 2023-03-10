<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\ICategoryService;
use App\Services\Interfaces\IProductService;

class HomeController extends Controller
{
    private IProductService $productService;
    private ICategoryService $categoryService;

    public function __construct(IProductService $productService, ICategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->findAll();
        foreach ($categories as $category) {
            $category->childProducts = $category->products()->paginate(5);
        }
        return view('main.index')->with('categories', $categories);
    }
}
