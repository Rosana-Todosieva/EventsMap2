<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class UserController extends  Controller
{
    public function my_profile(): Response
    {
        return Inertia::render('MyProfile');
    }
}
