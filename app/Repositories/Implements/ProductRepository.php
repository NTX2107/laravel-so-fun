<?php

namespace App\Repositories\Implements;

use App\Models\Product;
use App\Repositories\AbstractRepository;
use App\Repositories\Interfaces\IProductRepository;

class ProductRepository extends AbstractRepository implements IProductRepository
{
    protected $model_class = Product::class;

    public function findAllByCategoryId($categoryId)
    {
        return Product::where('category_id', $categoryId)->paginate(3);
    }
}
