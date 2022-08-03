<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Event;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function homepage(Request $request): Response
    {
        $city_id = $request->get('city_id');
        $date = $request->get('date');
        $cities = City::all();
        $events = Event::query()
            ->when($city_id, fn($q)=> $q->whereHas('user', fn($q)=>$q->whereHas('creator', fn($q)=> $q->where('city_id', $city_id))))
            ->when($date, fn($q)=> $q->where('date', $date), fn($q)=>  $q->where('date', '>', now()->subDays(5)->toDateString()))
            ->with('user.creator.city')
            ->get();

        return Inertia::render("Homepage", compact('events', 'cities'));
    }
}
