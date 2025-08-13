@extends('layouts.app')

@section('content')
<!-- Latest News -->
<section class="py-12 bg-gray-50" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-6">Latest News</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
                <div class="bg-white shadow rounded overflow-hidden hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($post->hero_image)
                        <img src="{{ asset('storage/' . $post->hero_image) }}" class="w-full h-48 object-cover" alt="{{ $post->title }}">
                    @endif
                    <div class="p-4">
                        <h3 class="font-bold text-lg mb-2">{{ $post->title }}</h3>
                        <p class="text-sm text-gray-600 mb-4">{{ Str::limit($post->excerpt, 80) }}</p>
                        <a href="#" class="text-green-800 font-semibold">Read More →</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Upcoming Events -->
<section class="py-12" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-6">Upcoming Events</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($upcomingEvents as $event)
                <div class="bg-white shadow rounded p-4 hover:shadow-lg transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($event->banner)
                        <img src="{{ asset('storage/' . $event->banner) }}" class="w-full h-40 object-cover rounded mb-4">
                    @endif
                    <h3 class="font-bold mb-2">{{ $event->title }}</h3>
                    <p class="text-sm text-gray-600">{{ $event->start_at->format('M d, Y H:i') }}</p>
                    <a href="{{ route('events.index') }}" class="text-green-800 font-semibold">View Details →</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Next Game -->
@if($nextGame)
<section class="bg-gray-100 py-12" data-aos="fade-up">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Next Game</h2>
        @if($nextGame->poster)
            <img src="{{ asset('storage/' . $nextGame->poster) }}" class="mx-auto h-56 object-cover rounded mb-4" data-aos="zoom-in">
        @endif
        <p class="font-bold text-lg">Olive Rugby vs {{ $nextGame->opponent }}</p>
        <p class="text-gray-600">{{ $nextGame->match_at->format('M d, Y H:i') }} — {{ $nextGame->venue }}</p>
    </div>
</section>
@endif

<!-- Sponsors -->
<section class="py-12 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-6 text-center">Our Sponsors</h2>
        <div class="flex flex-wrap justify-center items-center gap-8">
            @foreach($sponsors as $sponsor)
                @if($sponsor->logo)
                    <a href="{{ $sponsor->website ?? '#' }}" target="_blank" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                        <img src="{{ asset('storage/' . $sponsor->logo) }}" class="h-16 object-contain">
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
