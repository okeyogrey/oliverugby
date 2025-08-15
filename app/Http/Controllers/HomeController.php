<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Post;
use App\Models\Event;
use App\Models\Game;

class HomeController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        $latestPosts = Post::orderBy('published_at', 'desc')->take(3)->get();
        $upcomingEvents = Event::where('start_at', '>=', now())
            ->orderBy('start_at')
            ->take(3)
            ->get();

        // Get the closest upcoming game that actually exists in the DB
        $nextGame = Game::where('match_at', '>=', now())
            ->whereNotNull('opponent') // Ensure opponent name exists
            ->orderBy('match_at', 'asc')
            ->first();

        // Optional: if no upcoming game, set to null so Blade doesn't show it
        if ($nextGame && !$nextGame->match_at) {
            $nextGame = null;
        }

        return view('home', compact('sponsors', 'latestPosts', 'upcomingEvents', 'nextGame'));
    }
}
