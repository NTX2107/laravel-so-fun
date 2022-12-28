<?php

namespace App\Http\Controllers;

use App\Enums\TypeAlert;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Interfaces\IUserService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $email = $validated['email'];
        $password = $validated['password'];
        $checked = Auth::attempt(['email' => $email, 'password' => $password], true);
        if ($checked) {
            toast('Đăng nhập thành công', TypeAlert::SUCCESS)->autoClose(5000);
            return redirect()->route('home');
        } else {
            toast('Đăng nhập thất bại', TypeAlert::ERROR)->autoClose(5000);
            return back();
        }
    }

    public function register(RegisterRequest $request)
    {

    }

    public function admin()
    {
        return view();
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        toast('Đã đăng xuất', TypeAlert::WARNING)->autoClose(5000);
        return redirect()->route('show.login');
    }
}
