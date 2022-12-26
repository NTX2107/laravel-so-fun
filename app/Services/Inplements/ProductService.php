<?php

namespace App\Services\Inplements;

use App\Repositories\Interfaces\IProductRepository;
use App\Services\Interfaces\IProductService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductService implements IProductService
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function findAll()
    {
        return $this->productRepository->findAll();
    }

    public function findById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function findAllTrashed()
    {
        return $this->productRepository->findAllTrashed();
    }

    public function findTrashedById($trashId)
    {
        return $this->productRepository->findTrashedById($trashId);
    }

    /** @throws \Exception */
    public function create($data)
    {
        return $this->productRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->productRepository->update($id, $data);
    }

    public function softDelete($id)
    {
        return $this->productRepository->softDelete($id);
    }

    public function restore($trashId)
    {
        return $this->productRepository->restore($trashId);
    }

    public function exists($val, $column)
    {
        return $this->productRepository->exists($val, $column);
    }

    public function findAllByCategoryId($category)
    {
        return $this->productRepository->findAllByCategoryId($category);
    }
}
