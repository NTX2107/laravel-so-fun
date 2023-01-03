<?php

namespace App\Http\Controllers\admin;

use App\Enums\TypeAlert;
use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\Interfaces\ICategoryService;
use App\Services\Interfaces\IProductService;

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
        $filterData = $filter->getAllFilterParams();
        $categories = $this->categoryService->findAll();
        $products = Product::filter($filter)->paginate(15);
        return view('admin.products.list')->with([
            'categories' => $categories,
            'products' => $products,
            'filters' => $filterData,
        ]);
    }

    public function detail($id)
    {
        $product = $this->productService->findById($id);
        return view('admin.products.detail')->with('product', $product);
    }

    public function loadFormCreate()
    {
        $categories = $this->categoryService->findAll();
        return view('admin.products.create')->with('categories', $categories);
    }

    public function create(ProductRequest $request)
    {
        $validated = $request->validated();
        $result = $this->productService->create($validated);
        if ($result == null) {
            toast('Create new product failed', TypeAlert::ERROR)->autoClose(5000);
            return redirect()->route('admin.show.create.product');
        }
        toast('Create new product successfully', TypeAlert::SUCCESS)->autoClose(5000);
        return redirect()->route('admin.show.products');
    }

    public function loadFormEdit($id)
    {
        $product = $this->productService->findById($id);
        $categories = $this->categoryService->findAll();
        $product['category_name'] = $product->category()->first()->name;
        return view('admin.products.edit')->with([
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function edit($id, ProductRequest $request)
    {
        $validated = $request->validated();
        $result = $this->productService->update($id, $validated);
        if ($result == null) {
            toast('Update product failed', TypeAlert::ERROR)->autoClose(5000);
            return redirect()->route('show.edit.product');
        } else {
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
