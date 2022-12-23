<?php

namespace App\Repositories\Implements;

use App\Models\Category;
use App\Repositories\AbstractRepository;
use App\Repositories\Interfaces\ICategoryRepository;

class CategoryRepository extends AbstractRepository implements ICategoryRepository
{
    protected $model_class = Category::class;
}
