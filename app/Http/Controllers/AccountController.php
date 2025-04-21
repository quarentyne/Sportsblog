<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function show(Request $request): View {
        return view('account.show', [
            'user'      => $request->user(),
        ]);
    }

    public function update(Request $request): RedirectResponse {
        $validatedData = $request->validate([
            'first_name'        => ['required', 'min:2', 'max:254'],
            'last_name'         => ['required', 'min:2', 'max:254'],
            'email'             => ['required', 'email', 'max:254'],
            'avatar'            => [File::image()],
        ]);

        if($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $path = $file->storeAs('avatars', $file->hashName(), 'public_avatars');
        }

        $userData = [
            'first_name'   => $validatedData['first_name'],
            'last_name'    => $validatedData['last_name'],
            'email'        => $validatedData['email'],
            'avatar'       => $path ?? '',
        ];

        User::where('id', $request->user()->id)->update($userData);

        return redirect()->back();
    }
}
