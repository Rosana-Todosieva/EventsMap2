<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EventController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Events/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required|integer|min:0',
            'description' => 'required',
            'image' => 'nullable'
        ]);
        $event = new Event($validated);
        $event->user()->associate($request->user());
        $event->save();
        return redirect()->route('events.show', $event);
    }

    public function show(Event $event)
    {
        return Inertia::render('Events/Show', compact('event'));
    }
}
