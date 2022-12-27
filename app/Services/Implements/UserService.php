<?php

namespace App\Services\Implements;

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
        $user = $this->userRepository->login($email);
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
}
