<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthenticateRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class AuthController extends Controller
{

    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(AuthenticateRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (!auth()->attempt($credentials)) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.'
                ]);
        }

        return to_route('home')
            ->with('success', 'You are now logged in.');
    }

    public function signup(): View
    {
        return view('auth.signup');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['name'] = $data['username'];

        $user = User::create($data);

        auth()->login($user);

        return to_route('home')
            ->with('success', 'You are now registered and logged in.');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();

        return to_route('home')
            ->with('success', 'You are now logged out.');
    }
}
