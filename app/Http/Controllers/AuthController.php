<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->merge([
            'email' => strtolower($request->email)
        ]);

        $request->validate([
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                'regex:/^[A-Za-z ]+$/'
            ],
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'unique:users,email'
            ],
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[@$!%*#?&]/'
            ],
        ], [
            'name.regex' => 'Name can contain only letters and spaces.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one special character (@$!%*#?&).',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        User::create([
            'name' => trim($request->name),
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Registration successful. Please login.');
    }

    public function login(Request $request)
    {
        $request->merge([
            'email' => strtolower($request->email)
        ]);

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('search.buses'));
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
