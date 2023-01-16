<?php

namespace App\Repositories\Implements;

use App\Models\User;
use App\Repositories\AbstractRepository;
use App\Repositories\Interfaces\IUserRepository;

class UserRepository extends AbstractRepository implements IUserRepository
{
    protected $model_class = User::class;

    function findByEmail($email)
    {
        return $this->model->newQuery()->where('email', '=', $email)->first();
    }

    function find($filters) {
        return parent::findBase($filters);
    }
}
