<?php

namespace App\Services\Implements;

use App\Enums\Role;
use App\Repositories\Interfaces\IUserRepository;
use App\Services\Interfaces\IUserService;
use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($email, $password)
    {
        $user = $this->userRepository->findByEmail($email);
        if ($user == null) {
            $user['message'] = 'Account not found';
            return $user;
        }
        $encryptPassword = Hash::check($password, $user->password);
        if (!$encryptPassword) {
            $user['message'] = 'Password not match';
        } else {
            $user['message'] = 'Login successfully';
        }
        return $user;
    }

    public function register($data)
    {
        $user = $this->userRepository->findByEmail($data['email']);
        if ($user != null) {
            $user['message'] = 'Account already exists';
            return $user;
        }
        $data['password'] = Hash::make($data['password']);
        $data['role'] = Role::USER;
        $result = $this->userRepository->create($data);
        if ($result == null) {
            $result['message'] = 'Create new account failed';
        } else {
            $result['message'] = 'Create new account successfully';
        }
        return $result;
    }

    public function find($filters)
    {
        $users = [];
        $arr_user = $this->userRepository->find($filters);
        foreach ($arr_user as $user) {
            $user['phone'] = convertPhoneToUsFormat($user['phone']);
            array_push($users, $user);
        }
        return $users;
    }
}
