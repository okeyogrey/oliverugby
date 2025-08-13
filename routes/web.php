<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestPosts = \App\Models\Post::latest()->take(3)->get();
    $upcomingEvents = \App\Models\Event::where('start_at', '>=', now())->orderBy('start_at')->take(3)->get();
    $nextGame = \App\Models\Game::where('match_at', '>=', now())->orderBy('match_at')->first();
    $sponsors = \App\Models\Sponsor::all();

    return view('welcome', compact('latestPosts', 'upcomingEvents', 'nextGame', 'sponsors'));
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::get('/news', [PostController::class, 'index'])->name('posts.index');
Route::get('/news/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

Route::get('/news', function () {
    $posts = \App\Models\Post::latest()->paginate(9);
    return view('news.index', compact('posts'));
})->name('news.index');

Route::get('/events', function () {
    $events = \App\Models\Event::orderBy('start_at', 'asc')->paginate(9);
    return view('events.index', compact('events'));
})->name('events.index');

Route::get('/games', function () {
    $games = \App\Models\Game::orderBy('match_at', 'desc')->paginate(10);
    return view('games.index', compact('games'));
})->name('games.index');

Route::get('/news/{post}', function (\App\Models\Post $post) {
    return view('news.show', compact('post'));
})->name('news.show');

Route::get('/events/{event}', function (\App\Models\Event $event) {
    return view('events.show', compact('event'));
})->name('events.show');

Route::get('/games/{game}', function (\App\Models\Game $game) {
    return view('games.show', compact('game'));
})->name('games.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
