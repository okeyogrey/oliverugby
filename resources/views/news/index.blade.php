@extends('layouts.app')

@section('content')

@include('components.page-hero', [
    'title' => 'Blog',
    'background' => 'images/about-banner.jpg',
    'subtitle' => 'Building a legacy on and off the pitch'
])


<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- <h1 class="text-4xl font-bold mb-8">Latest News</h1> -->
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <a href="{{ route('news.show', $post) }}" 
                   class="block bg-white rounded shadow hover:shadow-lg transition overflow-hidden hover:bg-green-50"
                    data-aos="fade-up">
                    @if($post->hero_image)
                        <img src="{{ asset('storage/' . $post->hero_image) }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($post->excerpt, 100) }}</p>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
