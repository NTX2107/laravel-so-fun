<?php

namespace App\Services\Interfaces;

interface IUserService
{
    public function login($email, $password);
    public function register($data);
}
