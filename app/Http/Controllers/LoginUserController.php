<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginUserController extends Controller
{
    public function create(): View {
        return view('auth.login');
    }

    public function store(Request $request) {
        $validatedUserData = $request->validate([
            'email'             => ['required', 'email', 'max:254'],
            'password'          => ['required'],
        ]);

        $isLogin = Auth::attempt($validatedUserData);

        if(!$isLogin) {
            throw ValidationException::withMessages([
                'email'     => 'Sorry, your credentials are wrong :(',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->to('home');
    }

    public function destroy(): RedirectResponse
    {
        Auth::logout();

        return redirect()->to('home');
    }
}
