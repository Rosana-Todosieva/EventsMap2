<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class EventController extends Controller
{
    public function create(): Response
    {
        $user = auth()->user();
        abort_unless($user && $user->creator, 404);
        return Inertia::render('Events/Create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        abort_unless($user && $user->creator, 404);
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required|integer|min:0',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8192'
        ]);
        $event = new Event($validated);
        $event->user()->associate($request->user());

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uniqueFileName = uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/events', $uniqueFileName);
            $event->image = $path;
        }

        $event->save();
        return redirect()->route('events.show', $event);
    }

    public function show(Event $event)
    {
        $event->loadMissing('user.creator.city');
        return Inertia::render('Events/Show', compact('event'));
    }

    public function edit(Event $event)
    {
        $user = auth()->user();
        abort_unless($user && $user->creator && $event->user_id == $user->id, 403);
        $event-> loadMissing('user');
        return Inertia::render('Events/Edit', compact('event'));
    }

    public function update(Event $event ,Request $request)
    {
        $user = auth()->user();
        abort_unless($user && $user->creator && $event->user_id == $user->id, 403);

        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required',
            'price' => 'required',
            'description' => 'nullable',
            'time' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uniqueFileName = uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/events', $uniqueFileName);
            $event->image = $path;
        }

        $event->fill($validated);
        $event->save();

        return redirect()->route('my_profile');

    }

    public function destroy(Event $event){
        $user = auth()->user();
        abort_unless($user && $user->creator && $event->user_id == $user->id, 403);

        $event->delete();
        return redirect()->back();
    }

    public function sold_out(Event $event){
        $user = auth()->user();
        abort_unless($user && $user->creator && $event->user_id == $user->id, 403);

        $event->sold_out = true;
        $event->save();
        return redirect()->back();
    }

}
