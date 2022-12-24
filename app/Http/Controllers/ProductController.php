<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\Interfaces\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private IProductService $productService;

    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index() {
        return $this->productService->findAll();
    }

    public function detail($id) {
        return $this->productService->findById($id);
    }

    public function create(ProductRequest $request) {
        return $this->productService->create($request);
    }

    public function delete($id) {
        return $this->productService->softDelete($id);
    }

    public function edit($id, ProductRequest $request) {
        $validated = $request->validated();
        return $this->productService->update($id, $validated);
    }
}
