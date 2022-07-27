<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends  Controller
{
    public function my_profile(): Response
    {
        $user = Auth::user();
        $user->loadMissing('creator.city');
        $events = $user
            ->events()
            ->with('user.creator.city')
            ->paginate(10);

        return Inertia::render('MyProfile', compact('user', 'events'));
    }

    public function edit_profile(): Response
    {
        $user = Auth::user();
        $user->loadMissing('creator.city');
        $cities = City::all();
        return Inertia::render('EditProfile',compact('user', 'cities'));
    }

    public function update_profile(Request $request): RedirectResponse
    {
        $user = auth()->user();
        $exclude = Rule::excludeIf(!$user->creator);
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => ['required','email', Rule::unique('users')->ignoreModel($user)],
            'city_id' => [$exclude, 'required', 'exists:cities,id'],
            'website' => [$exclude, 'nullable'],
            'address' => [$exclude, 'required'],
            'description' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uniqueFileName = uniqid() . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/events', $uniqueFileName);
            $user->image = $path;
        }

        if($user->creator){
            $city = City::find($validated['city_id']);
            $user->creator->city()->associate($city);
            $user->creator->fill($validated);
            $user->creator->save();
        }

        $user->fill($validated);
        $user->save();

        return redirect(route('my_profile'));
    }
}
