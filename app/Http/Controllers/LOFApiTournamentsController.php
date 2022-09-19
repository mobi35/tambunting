<?php

namespace App\Http\Controllers;

use App\Http\Resources\LOFApiTournamentResource;
use App\Http\Resources\LOFPokerTournamentResource;
use Illuminate\Http\Request;
use App\Models\PokerTournament;
use App\Http\Resources\PokerTournamentResource;

class LOFApiTournamentsController extends Controller
{
    public function index()
    {
        return  LOFApiTournamentResource::collection(PokerTournament::latest()->paginate(10));
    }
}
