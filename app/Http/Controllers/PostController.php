<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // If you store publish time in `published_at`, show newest first
        $posts = Post::orderBy('published_at', 'desc')->paginate(6);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // Optional: fetch 3 related/latest posts for sidebar/related section
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
