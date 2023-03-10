<?php

namespace App\Repositories\Interfaces;

use App\Repositories\BaseRepository;

interface IUserRepository extends BaseRepository
{
    function findByEmail($email);
}
