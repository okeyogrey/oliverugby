@extends('layouts.app')

@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 max-w-3xl text-center">
        @if($game->poster)
            <img src="{{ asset('storage/' . $game->poster) }}" alt="Match Poster" class="mx-auto h-72 object-cover rounded mb-6">
        @endif

        <h1 class="text-lg md:text-2xl font-bold mb-2">{{ $game->home_team }} (Home) vs {{ $game->away_team }} (Away)</h1>
        <p class="text-gray-500 mb-4">{{ $game->match_at->format('F j, Y H:i') }} — {{ $game->venue }}</p>

        @if($game->home_score !== null && $game->away_score !== null)
            <p class="text-lg md:text-2xl font-bold text-green-800 mb-6">
                {{ $game->home_team }} {{ $game->home_score }} -    
                {{ $game->away_score }} {{ $game->away_team }} 
            </p>
        @else
            <p class="text-gray-500 mb-6 italic">Match not yet played.</p>
        @endif

        @if(!empty($game->notes))
            <div class="prose max-w-none text-left bg-gray-50 p-4 rounded shadow">
                <h2 class="font-semibold mb-2">Match Notes:</h2>
                <p>{!! nl2br(e($game->notes)) !!}</p>
            </div>
        @endif

        <div class="mt-8">
            <a href="{{ route('games.index') }}" class="text-green-800 font-semibold">← Back to Fixtures</a>
        </div>
    </div>
</section>
@endsection