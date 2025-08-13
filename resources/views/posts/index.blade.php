@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-bold mb-6">Latest News</h2>

<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($posts as $post)
        <div class="bg-white shadow rounded p-4">
            <h3 class="font-bold text-xl mb-2">{{ $post->title }}</h3>
            <p class="text-sm text-gray-500 mb-2">{{ $post->published_at->format('M d, Y') }}</p>
            <p class="text-sm mb-4">{{ Str::limit($post->excerpt, 100) }}</p>
            <a href="{{ route('posts.show', $post) }}" class="text-green-800">Read More →</a>
        </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $posts->links() }}
</div>
@endsection
