<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private IProductService $productService;

    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getListProducts() {
        return $this->productService->findAll();
    }

    public function getProductDetail($id) {
        return $this->productService->findById($id);
    }
}
