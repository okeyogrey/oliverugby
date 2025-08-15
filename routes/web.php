<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\GalleryController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// News (Posts)
Route::get('/news', [PostController::class, 'index'])->name('posts.index');
Route::get('/news/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// Games
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

//About Us
Route::view('/about', 'about')->name('about');

//Donate
Route::get('/donate', [DonateController::class, 'index'])->name('donate');
Route::post('/donate', [DonateController::class, 'process'])->name('donate.process');

//Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// Why Partner With Us page
Route::get('/why-partner-with-us', function () {
    return view('why-partner');
})->name('why-partner');

// Sponsorship kit form handler
Route::post('/sponsor-request', [App\Http\Controllers\SponsorController::class, 'requestKit'])->name('sponsor.request');

// Dashboard (auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
