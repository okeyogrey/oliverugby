@extends('layouts.app')

@section('content')

@include('components.page-hero', [
    'title' => 'Blog',
    'background' => 'images/about-banner.jpg',
    'subtitle' => 'Building a legacy on and off the pitch'
])


<section class="py-8">
    <div class="flex items-end justify-between mb-6">
        <!-- <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight" data-aos="fade-right">
            Latest News
        </h2> -->
        <form method="GET" action="{{ route('posts.index') }}" class="hidden md:block" data-aos="fade-left">
            <div class="relative">
                <input name="q" value="{{ request('q') }}"
                       class="pl-10 pr-4 py-2 rounded-full border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500"
                       placeholder="Search news...">
                <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"/>
                </svg>
            </div>
        </form>
    </div>

    <div class="flex flex-wrap gap-3 justify-center mb-8">
    <a href="?category=community" class="px-4 py-1 rounded-full border border-green-700 text-green-700 hover:bg-green-700 hover:text-white text-sm">Community</a>
    <a href="?category=training" class="px-4 py-1 rounded-full border border-green-700 text-green-700 hover:bg-green-700 hover:text-white text-sm">Training</a>
    <a href="?category=events" class="px-4 py-1 rounded-full border border-green-700 text-green-700 hover:bg-green-700 hover:text-white text-sm">Events</a>
</div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        @forelse($posts as $post)
        
            <article class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                @if($post->hero_image)
                    <a href="{{ route('posts.show', ['post' => $post->slug]) }}">
                        <img src="{{ asset('storage/' . $post->hero_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    </a>
                @endif

                <div class="p-5">
                    <div class="text-xs uppercase tracking-wider text-gray-500 mb-2">
                        {{ optional($post->published_at)->format('M d, Y') }}
                    </div>
                    <h3 class="text-xl font-bold leading-snug mb-2">
                        <a href="{{ route('posts.show', ['post' => $post->slug]) }}" class="hover:text-green-700">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-600 mb-4">
                        {{ \Illuminate\Support\Str::limit($post->excerpt ?? strip_tags($post->body), 120) }}
                    </p>
                    <a href="{{ route('posts.show', ['post' => $post->slug]) }}" class="inline-flex items-center text-green-800 font-semibold">
                        Read More →
                    </a>
                </div>
            </article>
        @empty
            <div class="col-span-full text-center text-gray-600" data-aos="fade-up">
                No news articles available yet.
            </div>
        @endforelse
    </div>

    <div class="mt-8" data-aos="fade-up">
        {{ $posts->links() }}
    </div>
</section>
<section class="py-12 bg-green-800 text-white text-center rounded-xl mt-12">
    <h3 class="text-2xl font-bold mb-2">Never miss an update</h3>
    <p class="mb-4 opacity-90">Get the latest Olive Rugby news delivered to your inbox.</p>
    <form class="flex justify-center">
        <input type="email" placeholder="Enter your email" class="px-4 py-2 rounded-l-lg focus:outline-none text-black">
        <button class="bg-green-600 px-4 py-2 rounded-r-lg font-semibold hover:bg-green-700">Subscribe</button>
    </form>
</section>

@endsection
