<?php

namespace App\Http\Controllers;
use App\Models\Creator;
use Inertia\Inertia;
use Inertia\Response;

class CreatorController extends Controller
{
    public function creators(): Response
    {
        $creators = Creator::query()
            ->with('user', 'city')
            ->get();
        return Inertia::render("Creators", compact('creators'));
    }
}
