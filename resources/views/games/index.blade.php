@extends('layouts.app')

@section('content')
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- <h1 class="text-4xl font-bold mb-8">Match Fixtures & Results</h1> -->

        {{-- Upcoming Games --}}
        @if($upcomingGames->count())
            <h2 class="text-2xl font-semibold mb-4 text-green-800">Upcoming Matches</h2>
            <div class="space-y-6 mb-6">
                @foreach($upcomingGames as $game)
                    <a href="{{ route('games.show', $game) }}" 
                       class="block bg-white rounded shadow hover:shadow-lg transition p-4 flex flex-col md:flex-row items-center md:justify-between hover:bg-green-50"
                       data-aos="fade-up">
                        <div class="flex items-center space-x-4">
                            @if($game->poster)
                                <img src="{{ asset('storage/' . $game->poster) }}" alt="Match Poster" class="w-20 h-20 object-cover rounded">
                            @endif
                            <div>
                                <h2 class="font-bold text-lg">{{ $game->home_team }} (Home) vs {{ $game->away_team }} (Away)</h2>
                                <p class="text-gray-600 text-sm">
                                    {{ $game->match_at->format('M d, Y H:i') }} — {{ $game->venue }}
                                </p>
                            </div>
                        </div>
                        <div class="mt-4 md:mt-0 text-gray-500 italic">
                            Not played yet
                        </div>
                    </a>
                @endforeach
            </div>
            <div>
                {{ $upcomingGames->links() }}
            </div>
        @endif

        {{-- Past Games --}}
        @if($pastGames->count())
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Past Matches</h2>
            <div class="space-y-6 mb-6">
                @foreach($pastGames as $game)
                    <a href="{{ route('games.show', $game) }}" 
                       class="block bg-white rounded shadow hover:shadow-lg transition p-4 flex flex-col md:flex-row items-center md:justify-between hover:bg-green-50"
                       data-aos="fade-up">
                        <div class="flex items-center space-x-4">
                            @if($game->poster)
                                <img src="{{ asset('storage/' . $game->poster) }}" alt="Match Poster" class="w-20 h-20 object-cover rounded">
                            @endif
                            <div>
                                <h2 class="font-bold text-lg">{{ $game->home_team }} (Home) vs {{ $game->away_team }} (Away)</h2>
                                <p class="text-gray-600 text-sm">
                                    {{ $game->match_at->format('M d, Y H:i') }} — {{ $game->venue }}
                                </p>
                            </div>
                        </div>
                        @if($game->home_score !== null && $game->away_score !== null)
                            <div class="mt-4 md:mt-0 text-2xl font-bold text-green-800">
                                {{ $game->home_score }} - {{ $game->away_score }}
                            </div>
                        @else
                            <div class="mt-4 md:mt-0 text-gray-500 italic">
                                Score not available
                            </div>
                        @endif
                    </a>
                @endforeach
            </div>
            <div>
                {{ $pastGames->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
