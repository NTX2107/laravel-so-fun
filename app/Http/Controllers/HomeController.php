<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ICategoryService;
use App\Services\Interfaces\IProductService;
use Illuminate\Http\Request;

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
            $category['childProducts'] = $this->productService->findAllByCategoryId($category->id);
        }
        return view('index')->with('categories', $categories);
    }
}
