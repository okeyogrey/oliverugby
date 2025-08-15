<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $upcomingGames = Game::where('match_at', '>=', now())
            ->orderBy('match_at', 'asc')
            ->paginate(5, ['*'], 'upcoming_page'); // separate page param

        $pastGames = Game::where('match_at', '<', now())
            ->orderBy('match_at', 'desc')
            ->paginate(5, ['*'], 'past_page'); // separate page param

        return view('games.index', compact('upcomingGames', 'pastGames'));
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }
}
