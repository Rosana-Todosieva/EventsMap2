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
        return Inertia::render('Events/Show', compact('event'));
    }

    public function edit(Event $event)
    {
        $event-> loadMissing('user');
        return Inertia::render('Events/Edit', compact('event'));
    }

    public function update(Event $event ,Request $request)
    {
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
        $event->delete();
        return redirect()->back();
    }

    public function sold_out(Event $event){
        $event->sold_out = true;
        $event->save();
        return redirect()->back();
    }

}
