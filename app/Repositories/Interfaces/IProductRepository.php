<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepository;

interface IProductRepository extends BaseRepository
{
    public function findAllByCategoryId($categoryId);
}
