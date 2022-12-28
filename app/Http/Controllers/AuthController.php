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

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $email = $validated['email'];
        $password = $validated['password'];
        $user = $this->userService->login($email, $password);
        if (isset($user->email)){
            $checked = Auth::attempt(['email' => $user->email, 'password' => $password]);
            if ($checked){
                toast($user['message'],TypeAlert::SUCCESS)->autoClose(5000);
                return redirect()->route('home');
            }else{
                toast($user['message'],TypeAlert::WARNING)->autoClose(5000);
                return back();
            }
        }else{
            toast($user,TypeAlert::ERROR)->autoClose(5000);
            return back();
        }
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $result = $this->userService->register($validated);
        if ($result->message == 'Create new account successfully') {
            toast($result['message'], TypeAlert::SUCCESS)->autoClose(5000);
            return redirect()->route('show.login');
        }
        else {
            toast($result['message'], TypeAlert::WARNING)->autoClose(5000);
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        toast('Đã đăng xuất', TypeAlert::WARNING)->autoClose(5000);
        return redirect()->route('show.login');
    }
}
