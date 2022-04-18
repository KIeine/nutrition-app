<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return inertia('AuthRegister');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        $user = User::create($credentials);
        Auth::login($user);

        return redirect()->route('home');
    }
}
