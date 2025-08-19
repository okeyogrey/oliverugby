@extends('layouts.app')

@section('content')

@include('components.page-hero', [
    'title' => 'Events',
    'background' => 'images/about-banner.jpg',
    'subtitle' => 'Building a legacy on and off the pitch'
])


<section class="py-12">
    <div class="container mx-auto px-4">
        <!-- <h1 class="text-4xl font-bold mb-8">Upcoming & Past Events</h1> -->
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($events as $event)
                <a href="{{ route('events.show', $event) }}" 
                   class="block bg-white rounded shadow hover:shadow-lg transition p-4 hover:bg-green-50"
                    data-aos="fade-up">
                    @if($event->banner)
                        <img src="{{ asset('storage/' . $event->banner) }}" class="w-full h-40 object-cover rounded mb-4">
                    @endif
                    <h2 class="font-bold text-xl mb-2">{{ $event->title }}</h2>
                    <p class="text-gray-600 text-sm mb-1">{{ $event->start_at->format('M d, Y H:i') }}</p>
                    @if($event->location)
                        <p class="text-gray-500 text-sm mb-3">📍 {{ $event->location }}</p>
                    @endif
                    <p class="text-gray-700 mb-4">{{ Str::limit($event->description, 100) }}</p>
                </a>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $events->links() }}
        </div>
    </div>
</section>
@endsection
