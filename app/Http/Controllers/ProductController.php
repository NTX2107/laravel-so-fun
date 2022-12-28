<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\Interfaces\IProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

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
        try {
            $validated = $request->validated();
            $this->productService->create($validated);
            return redirect(route('home'))->with('success', 'Product has been created successfully');
        } catch (\Exception) {
            return redirect(route('show.create.product'))->with('error', 'Failed to create new product! Try again');
        }
    }

    public function loadFrom() {
        return view('products.create');
    }

    public function delete($id) {
        return $this->productService->softDelete($id);
    }

    public function edit($id, ProductRequest $request) {
        $validated = $request->validated();
        return $this->productService->update($id, $validated);
    }
}
