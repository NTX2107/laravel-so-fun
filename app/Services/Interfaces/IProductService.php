<?php

namespace App\Services\Interfaces;

interface IProductService
{
    public function findAll(); //without trash

    public function findById($id);

    public function findAllTrashed();

    public function findTrashedById($trashId);

    public function create($data);

    public function update($id, $data);

    public function softDelete($id);

    public function restore($trashId);

    public function exists($val, $column);
}
