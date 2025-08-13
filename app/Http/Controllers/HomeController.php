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
        $upcomingEvents = Event::where('start_at', '>=', now())->orderBy('start_at')->take(3)->get();
        $nextGame = Game::where('match_at', '>=', now())->orderBy('match_at')->first();

        return view('home', compact('sponsors', 'latestPosts', 'upcomingEvents', 'nextGame'));
    }
}
