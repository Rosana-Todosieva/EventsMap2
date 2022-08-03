<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Creator;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inertia\Inertia;
use Inertia\Response;

class CreatorController extends Controller
{
    public function creators(): Response
    {
        return Inertia::render("Creators");
    }
}
