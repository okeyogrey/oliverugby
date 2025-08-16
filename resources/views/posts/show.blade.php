@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-5xl grid grid-cols-1 lg:grid-cols-3 gap-12">
        
        <!-- Blog Content -->
        <article class="lg:col-span-2 bg-white shadow rounded-lg p-6">
            @if($post->hero_image)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $post->hero_image) }}" 
                         alt="{{ $post->title }}" 
                         class="w-full h-80 object-cover rounded-lg shadow">
                </div>
            @endif

            <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
            <div class="flex items-center text-sm text-gray-500 mb-6">
                <span>{{ $post->created_at->format('F j, Y') }}</span>
                <span class="mx-2">•</span>
                <span>By Olive Rugby</span>
            </div>

            <div class="prose max-w-none">
                {!! $post->body !!}
            </div>

            <!-- Post actions -->
            <div class="flex items-center justify-between mt-8 border-t pt-6">
                <!-- Likes -->
                <form action="{{ route('posts.like', $post->id) }}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    <button type="submit" class="flex items-center {{ $post->likes->where('user_id', auth()->id())->count() ? 'text-red-600' : 'text-gray-600 hover:text-green-700' }}">
                        <i class="{{ $post->likes->where('user_id', auth()->id())->count() ? 'fa-solid fa-heart' : 'fa-regular fa-heart' }} mr-1"></i>
                        Like
                    </button>
                    <span class="text-sm text-gray-500">{{ $post->likes->count() }} Likes</span>
                </form>

                <!-- Share -->
                <div class="flex items-center space-x-3">
                    <a href="#" class="text-gray-500 hover:text-blue-600"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-gray-500 hover:text-sky-500"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="text-gray-500 hover:text-pink-600"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>

            <!-- Comments -->
            <div class="mt-12">
                <h3 class="text-2xl font-bold mb-4">Comments</h3>
                
                <!-- Existing comments -->
                <div class="space-y-6 mb-6">
                    @foreach($post->comments->where('parent_id', null) as $comment)
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <p class="font-semibold">{{ $comment->guest_name ?? $comment->user->name }}</p>
                            <p class="text-gray-700">{{ $comment->body }}</p>
                            <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                
                            <!-- Reply button -->
                            <button onclick="document.getElementById('reply-form-{{ $comment->id }}').classList.toggle('hidden')" 
                                    class="text-sm text-green-700 mt-2">Reply</button>
                
                            <!-- Reply form -->
                            <form id="reply-form-{{ $comment->id }}" action="{{ route('posts.comment', $post->id) }}" 
                                  method="POST" class="space-y-2 hidden mt-3">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <input type="text" name="guest_name" 
                                       class="w-full border rounded-lg p-2" placeholder="Your name" required>
                                <textarea name="body" rows="2" class="w-full border rounded-lg p-2" placeholder="Write a reply..." required></textarea>
                                <button type="submit" class="bg-green-700 text-white px-3 py-1 rounded-lg">Reply</button>
                            </form>
                
                            <!-- Nested replies -->
                            @if($comment->replies->count())
                                <div class="ml-6 mt-4 space-y-4">
                                    @foreach($comment->replies as $reply)
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <p class="font-semibold">{{ $reply->guest_name ?? $reply->user->name }}</p>
                                            <p class="text-gray-700">{{ $reply->body }}</p>
                                            <p class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>


                <!-- Comment form -->
                <form action="{{ route('posts.comment', $post->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="guest_name" 
                        class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-700"
                        placeholder="Your name (required)" required>

                    <textarea name="body" rows="3" 
                        class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-700"
                        placeholder="Write a comment..." required></textarea>

                    <button type="submit" 
                        class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Post Comment
                    </button>
                </form>

            </div>
        </article>

        <!-- Sidebar -->
        <aside class="space-y-8">
            <!-- Related posts -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Related Articles</h3>
                <ul class="space-y-3">
                    @foreach($relatedPosts as $related)
                        <li>
                            <a href="{{ route('posts.show', $related->id) }}" 
                               class="text-green-700 hover:underline">
                                {{ $related->title }}
                            </a>
                            <p class="text-sm text-gray-500">{{ $related->created_at->format('M j, Y') }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</section>
@endsection
