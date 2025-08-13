@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h2 class="text-3xl font-bold mb-4">{{ $post->title }}</h2>
    <p class="text-sm text-gray-500 mb-4">{{ $post->published_at->format('M d, Y') }}</p>
    <div class="prose max-w-none">
        {!! $post->body !!}
    </div>
</div>

<a href="{{ route('posts.index') }}" class="inline-block mt-4 text-green-800">← Back to News</a>
@endsection
