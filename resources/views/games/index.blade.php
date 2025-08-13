@extends('layouts.app')

@section('content')
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-8">Match Fixtures & Results</h1>
        <div class="space-y-6">
            @foreach($games as $game)
                <a href="{{ route('games.show', $game) }}" 
                   class="block bg-white rounded shadow hover:shadow-lg transition p-4 flex flex-col md:flex-row items-center md:justify-between hover:bg-green-50"
                    data-aos="fade-up">
                    <div class="flex items-center space-x-4">
                        @if($game->poster)
                            <img src="{{ asset('storage/' . $game->poster) }}" class="w-20 h-20 object-cover rounded">
                        @endif
                        <div>
                            <h2 class="font-bold text-lg">Olive Rugby vs {{ $game->opponent }}</h2>
                            <p class="text-gray-600 text-sm">{{ $game->match_at->format('M d, Y H:i') }} — {{ $game->venue }}</p>
                        </div>
                    </div>
                    @if($game->score_home !== null && $game->score_away !== null)
                        <div class="mt-4 md:mt-0 text-2xl font-bold text-green-800">
                            {{ $game->score_home }} - {{ $game->score_away }}
                        </div>
                    @endif
                </a>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $games->links() }}
        </div>
    </div>
</section>
@endsection
