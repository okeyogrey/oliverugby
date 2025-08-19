<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Official;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $currentPlayers = Player::where('team', 'current')->get();
        $pastPlayers = Player::where('team', 'past')->get();
        $officials = Official::all();

        return view('players.index', compact('currentPlayers', 'pastPlayers', 'officials'));
    }

    public function show(Player $player)
    {
        return view('players.show', compact('player'));
    }
    public function modal(Player $player)
    {
        return view('players.modal', compact('player'));
    }

}
