<?php

namespace App\Http\Controllers;

use App\Models\City;
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
        $cities = City::all();
        return Inertia::render('Auth/Register', compact('types', 'cities'));
    }

    public function register(Request $request): RedirectResponse
    {
        $exclude = Rule::excludeIf($request->type != User::CREATOR);
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'type' => ['required', Rule::in(User::types)],
            'city_id' => [$exclude, 'required', 'exists:cities,id'],
            'website' => [$exclude, 'nullable'],
            'address' => [$exclude, 'required']
        ]);
        $user = new User($validated);
        $user->save();
        $user->createCreatorIfNeeded($validated);
        Auth::login($user);
        event(new Registered($user));
        return redirect()->intended(route('homepage'));
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
