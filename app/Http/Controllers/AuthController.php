<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    public function show_login(): Response
    {
        return Inertia::render('Auth/Login');
    }

    public function show_register(): Response
    {
        $types = User::types;
        return Inertia::render('Auth/Register',compact('types'));
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'type' => ['required', Rule::in(User::types)]
        ]);
        $user = new User($validated);
        $user->save();
        $user->createCreatorIfNeeded();
        Auth::login($user);
        event(new Registered($user));
        return redirect()->route('homepage');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('homepage'));
        }

        return back()->withErrors([
            'credentials' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('auth.login'));
    }
}
