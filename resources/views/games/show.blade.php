@extends('layouts.app')

@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 max-w-3xl text-center">
        @if($game->poster)
            <img src="{{ asset('storage/' . $game->poster) }}" class="mx-auto h-72 object-cover rounded mb-6">
        @endif
        <h1 class="text-3xl font-bold mb-2">Olive Rugby vs {{ $game->opponent }}</h1>
        <p class="text-gray-500 mb-4">{{ $game->match_at->format('F j, Y H:i') }} — {{ $game->venue }}</p>
        @if($game->score_home !== null && $game->score_away !== null)
            <p class="text-2xl font-bold text-green-800 mb-6">{{ $game->score_home }} - {{ $game->score_away }}</p>
        @endif
        <div class="prose max-w-none">
            {!! nl2br(e($game->description ?? 'No additional match details available.')) !!}
        </div>
        <div class="mt-8">
            <a href="{{ route('games.index') }}" class="text-green-800 font-semibold">← Back to Fixtures</a>
        </div>
    </div>
</section>
@endsection
