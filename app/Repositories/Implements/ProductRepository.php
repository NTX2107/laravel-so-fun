<?php

namespace App\Repositories\Implements;

use App\Models\Product;
use App\Repositories\AbstractRepository;
use App\Repositories\Interfaces\IProductRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductRepository extends AbstractRepository implements IProductRepository
{
    protected $model_class = Product::class;

    public function findAllByCategoryId($categoryId)
    {
        return Product::where('category_id', $categoryId)->paginate(3);
    }

    public function create($data)
    {
        $category = DB::table('categories')
            ->select('code')
            ->where('id', $data['category_id'])
            ->first();
        $data['code'] = $category->code.Str::random(6);
        $result = $this->model->newQuery()->create($data);
        return $this->model->find($result->id);
    }
}
