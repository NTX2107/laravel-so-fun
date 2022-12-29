<?php

namespace App\Filters;

class ProductFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'name',
        'quantity',
        'code',
        'price',
        'category_id',
    ];

    public function filterName($name)
    {
        return $this->builder->where('name', 'like', '%' . $name . '%');
    }
}
