<?php

namespace App\Http\Controllers;

use App\Enums\TypeAlert;
use App\Http\Requests\LoginRequest;
use App\Services\Interfaces\IUserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private IUserService $userService;

    public function __construct(IUserService $userService) {
        $this->userService = $userService;
    }

    public function index() {
        return view('auth.login');
    }


    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $email = $validated['email'];
        $password = $validated['password'];
        $user = $this->userService->login($email, $password);
        if (isset($user)) {
            $checked = Auth::attempt(['email' => $email, 'password' => $password]);
            if ($checked) {
                toast($user['message'], TypeAlert::SUCCESS)->autoClose(5000);
                return redirect()->route('home');
            }
            else {
                toast($user['message'], TypeAlert::WARNING)->autoClose(5000);
                return back();
            }
        } else {
            toast($user['message'], TypeAlert::ERROR)->autoClose(5000);
            return back();
        }
    }

    public function logout() {
        Auth::logout();
        session()->flush();
        toast('Đã đăng xuất',TypeAlert::WARNING)->autoClose(5000);
        return redirect()->route('show.login');
    }
}
