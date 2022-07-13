<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return Inertia::render('Auth/Register');
    }
}
