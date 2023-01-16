<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbstractRepository implements BaseRepository
{
    /** @var Model::class */
    protected $model_class;
    /** @var Model */
    protected mixed $model;

    /** @throws BindingResolutionException */
    public function __construct()
    {
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
        return $this->model->withTrashed()->find($id);
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

    function findBase(array $filters, $extra_query = null)
    {
        $query_builder = $this->model->query()
            ->when($filters['search'] ?? null, function ($q, $search) {
                foreach ($this->model->searchable ?? [] as $index => $field) {
                    if (str_contains($field, '.')) {
                        $parts = explode('.', $field);
                        $q->orWhereHas(snakeToCamel($parts[0]), function ($q2) use ($parts, $search) {
                            return $q2->where($parts[1], 'like', '%' . $search . '%');
                        });
                    } else {
                        $q->orWhere($this->model->getTable() . '.' . $field, 'like', '%' . $search . '%');
                    }
                }
                return $q;
            })->when($filters['with'] ?? null, function ($q, $with) {
                $q->with($with);
            });
        if (method_exists($this->model, 'scopeFilter')) {
            $query_builder = $query_builder->filter($filters);
        }
        if (method_exists($this->model, 'scopeSort')) {
            $query_builder = $query_builder->sort($filters);
        } else {
            $query_builder->when($filters['sort_field'] ?? null,
                function ($q, $sort_field) use ($filters) {
                    $sort_order = array_key_exists('sort_order', $filters) && $filters['sort_order'] == 'descend' ? 'desc' : 'asc';
                    return $q->orderBy($sort_field, $sort_order);
                }, function ($q) {
                    if ($this->model->default_sort_field ?? null) {
                        return $q->orderBy($this->model->default_sort_field, $this->model->default_sort_order ?? 'asc');
                    } else return $q->latest();
                });
        }
        if ($extra_query) {
            $query_builder = $extra_query($query_builder);
        }
        if ($filters['limit'] ?? null) {
            if (array_key_exists('pagination', $filters) && $filters['pagination'] == false) {
                return $query_builder->limit($filters['limit'])->get();
            } else {
                return $query_builder->paginate($filters['limit'])->withQueryString();
            }
        } else {
            return $query_builder->get();
        }
    }
}
