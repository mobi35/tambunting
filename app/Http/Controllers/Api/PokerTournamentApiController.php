<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PokerTournamentResource;
use App\Models\PokerTournament;
use Illuminate\Routing\Controller;

class PokerTournamentApiController extends Controller
{
    public function index()
    {
        return  PokerTournamentResource::collection(PokerTournament::with(['poker_tour', 'poker_events'])->latest()->paginate(10));
    }

    public function show($id)
    {
        return new PokerTournamentResource(PokerTournament::where('slug', $id)->first());
    }
}
