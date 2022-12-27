<?php

namespace App\Services\Implements;

use App\Repositories\Interfaces\ICategoryRepository;
use App\Services\Interfaces\ICategoryService;

class CategoryService implements ICategoryService
{
    private ICategoryRepository $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function findAll()
    {
        return $this->categoryRepository->findAll();
    }

    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function findAllTrashed()
    {
        return $this->categoryRepository->findAllTrashed();
    }

    public function findTrashedById($trashId)
    {
        return $this->categoryRepository->findTrashedById($trashId);
    }

    public function create($data)
    {
        return $this->categoryRepository->create($data);
    }

    public function update($id, $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function softDelete($id)
    {
        return $this->categoryRepository->softDelete($id);
    }

    public function restore($trashId)
    {
        return $this->categoryRepository->restore($trashId);
    }

    public function exists($val, $column)
    {
        return $this->categoryRepository->exists($val, $column);
    }
}
