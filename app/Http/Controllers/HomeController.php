<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function homepage(): Response
    {
        $events = Event::query()
            ->whereHas('user.creator')
            ->with('user.creator.city')
            ->get();

        return Inertia::render("Homepage", compact('events'));
    }
}
