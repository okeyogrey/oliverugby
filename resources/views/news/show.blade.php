@extends('layouts.app')

@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 max-w-3xl">
        @if($post->hero_image)
            <img src="{{ asset('storage/' . $post->hero_image) }}" class="w-full h-72 object-cover rounded mb-6">
        @endif
        <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-500 text-sm mb-8">{{ $post->created_at->format('F j, Y') }}</p>
        <div class="prose max-w-none">
            {!! nl2br(e($post->body)) !!}
        </div>
        <div class="mt-8">
            <a href="{{ route('news.index') }}" class="text-green-800 font-semibold">← Back to News</a>
        </div>
    </div>
</section>
@endsection
