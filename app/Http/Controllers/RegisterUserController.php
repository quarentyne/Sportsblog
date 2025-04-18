<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterUserController extends Controller
{
    public function create(): View {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedUserData = $request->validate([
            'first_name'        => ['required', 'min:2', 'max:254'],
            'last_name'         => ['required', 'min:2', 'max:254'],
            'email'             => ['required', 'email', 'max:254'],
            'password'          => ['required', 'confirmed', Password::min(8)->numbers()->letters()->mixedCase()],
        ]);

        $user = User::create($validatedUserData);

        Auth::login($user);

        return redirect()->route('home');
    }
}
