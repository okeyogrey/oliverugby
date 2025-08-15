@extends('layouts.app')

@section('content')
<article class="mb-10">
    {{-- Hero banner (uses post hero image if present) --}}
    @if($post->hero_image)
        <div class="relative rounded-2xl overflow-hidden h-60 md:h-96 mb-6" data-aos="fade-up">
            <img src="{{ asset('storage/' . $post->hero_image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-black/10"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8 text-white">
                <h1 class="text-3xl md:text-5xl font-extrabold leading-tight">{{ $post->title }}</h1>
                <div class="text-sm mt-2 text-gray-200">
                    {{ optional($post->published_at)->format('M d, Y') }}
                </div>
            </div>
        </div>
    @else
        <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-2" data-aos="fade-up">{{ $post->title }}</h1>
        <div class="text-sm mb-6 text-gray-500" data-aos="fade-up" data-aos-delay="100">
            {{ optional($post->published_at)->format('M d, Y') }}
        </div>
    @endif

    {{-- Body --}}
    <div class="bg-white rounded-2xl shadow p-6 md:p-8 prose max-w-none" data-aos="fade-up">
        {!! $post->body !!}
    </div>

    <div class="mt-6" data-aos="fade-up">
        <a href="{{ route('posts.index') }}" class="inline-flex items-center text-green-800 font-semibold">
            ← Back to News
        </a>
    </div>
</article>

{{-- Related posts --}}
@if(!empty($relatedPosts) && $relatedPosts->count())
<section class="mt-10">
    <h2 class="text-2xl font-bold mb-4" data-aos="fade-right">Related Articles</h2>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($relatedPosts as $rp)
            <article class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}">
                @if($rp->hero_image)
                    <a href="{{ route('posts.show', ['post' => $rp->slug]) }}">
                        <img src="{{ asset('storage/' . $rp->hero_image) }}" alt="{{ $rp->title }}" class="w-full h-40 object-cover">
                    </a>
                @endif
                <div class="p-5">
                    <div class="text-xs uppercase tracking-wider text-gray-500 mb-2">
                        {{ optional($rp->published_at)->format('M d, Y') }}
                    </div>
                    <h3 class="text-lg font-bold leading-snug mb-2">
                        <a href="{{ route('posts.show', ['post' => $rp->slug]) }}" class="hover:text-green-700">
                            {{ $rp->title }}
                        </a>
                    </h3>
                    <a href="{{ route('posts.show', ['post' => $rp->slug]) }}" class="inline-flex items-center text-green-800 font-semibold">
                        Read More →
                    </a>
                </div>
            </article>
        @endforeach
    </div>
</section>
@endif
@endsection
