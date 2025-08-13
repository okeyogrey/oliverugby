@extends('layouts.app')

@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 max-w-3xl">
        @if($event->banner)
            <img src="{{ asset('storage/' . $event->banner) }}" class="w-full h-72 object-cover rounded mb-6">
        @endif
        <h1 class="text-4xl font-bold mb-4">{{ $event->title }}</h1>
        <p class="text-gray-500 text-sm mb-2">{{ $event->start_at->format('F j, Y H:i') }}</p>
        @if($event->location)
            <p class="text-gray-600 mb-6">📍 {{ $event->location }}</p>
        @endif
        <div class="prose max-w-none">
            {!! nl2br(e($event->description)) !!}
        </div>
        <div class="mt-8">
            <a href="{{ route('events.index') }}" class="text-green-800 font-semibold">← Back to Events</a>
        </div>
    </div>
</section>
@endsection
