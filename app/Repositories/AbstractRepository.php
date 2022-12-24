<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;

class AbstractRepository implements BaseRepository
{
    /** @var Model::class */
    protected $model_class;
    /** @var Model */
    protected mixed $model;

    /** @throws BindingResolutionException */
    public function __construct() {
        if ($this->model_class) {
            $this->model = app()->make($this->model_class);
        }
    }

    public function findAll()
    {
        return $this->model->all();
//        return $this->model->query()->get();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function findAllTrashed()
    {
        return $this->model->onlyTrashed()->get();
    }

    public function findTrashedById($trashId)
    {
        return $this->model->withTrashed()->find($trashId);
    }

    public function create($data)
    {
        $result = $this->model->newQuery()->create($data);
        return $this->model->find($result->id);
    }

    public function update($id, $data)
    {
        $record = $this->model->find($id);
        $record->fill($data);
        $record->save();
        $record->refresh();
        return $record;
    }

    public function softDelete($id)
    {
        $record = $this->model->find($id);
        $record->delete();
    }

    public function restore($trashId)
    {
        $record = $this->model->withTrashed()->find($trashId);
        $record->restore();
        $record->refresh();
        return $record;
    }

    public function exists($val, $column)
    {
        return $this->model->newQuery()->where($column, $val)->exists();
    }
}
