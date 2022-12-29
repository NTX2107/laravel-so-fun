<?php

namespace App\Http\Controllers;

use App\Enums\TypeAlert;
use App\Filters\ProductFilter;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\Interfaces\ICategoryService;
use App\Services\Interfaces\IProductService;
use Illuminate\Http\Client\Request;

class ProductController extends Controller
{
    private IProductService $productService;
    private ICategoryService $categoryService;

    public function __construct(IProductService $productService, ICategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index(ProductFilter $filter)
    {
        $categories = $this->categoryService->findAll();
        $products = Product::filter($filter)->get();
//        $products = $this->productService->findAll();
        return view('admin.index')
            ->with('categories', $categories)
            ->with('products', $products);
    }

    public function detail($id)
    {
        return $this->productService->findById($id);
    }

    public function loadFromCreate()
    {
        $categories = $this->categoryService->findAll();
        return view('admin.products.create')
            ->with('title', 'Create new product')
            ->with('categories', $categories);
    }

    public function create(ProductRequest $request)
    {
        $validated = $request->validated();
        $result = $this->productService->create($validated);
        if ($result == null) {
            toast('Create new product failed', TypeAlert::ERROR)->autoClose(5000);
            return redirect()->route('show.create.product');
        }
        toast('Create new product successfully', TypeAlert::SUCCESS)->autoClose(5000);
        return redirect()->route('show.all.products');
    }

    public function loadFormEdit($id) {
        $product = $this->productService->findById($id);
        $categories = $this->categoryService->findAll();
        $product['category_name'] = $product->category()->first()->name;
        return view('admin.products.edit')
            ->with('title', 'Edit product')
            ->with('product', $product)
            ->with('categories', $categories);
    }

    public function edit($id, ProductRequest $request)
    {
        $validated = $request->validated();
        $result = $this->productService->update($id, $validated);
        if ($result == null) {
            toast('Update product failed', TypeAlert::ERROR)->autoClose(5000);
            return redirect()->route('show.edit.product');
        }
        else {
            toast('Update product successfully', TypeAlert::SUCCESS)->autoClose(5000);
            return redirect()->route('show.all.products');
        }
    }

    public function delete($id)
    {
        $result = $this->productService->softDelete($id);
        if ($result == null) {
            toast('Delete product failed', TypeAlert::ERROR)->autoClose(5000);
            return back();
        } else {
            toast('Delete product successfully', TypeAlert::SUCCESS)->autoClose(5000);
            return redirect()->route('show.all.products');
        }
    }
}
