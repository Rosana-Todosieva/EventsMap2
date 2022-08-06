<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Creator;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    public function creators(Request $request): Response
    {
        $city_id = $request->get('city_id');
        $name = $request->get('name');
        $cities = City::all();
        $creators = Creator::query()
            ->when($city_id, fn($q)=> $q->where('city_id', $city_id))
            ->when($name, fn($q)=> $q->whereHas('user', fn($q)=> $q->where('name', $name)))
            ->with('user', 'city')
            ->get();
        return Inertia::render("Creators", compact('creators','cities'));
    }
}
