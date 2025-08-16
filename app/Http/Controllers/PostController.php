<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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
        // Load comments and likes
        $post->load(['comments.replies', 'comments.user', 'likes']);

        // Fetch related posts (exclude current one)
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }

    public function like($id)
    {
        $post = Post::findOrFail($id);
        $user = auth()->user();

        // Toggle like
        $like = $post->likes()->where('user_id', $user->id)->first();
        if ($like) {
            $like->delete();
        } else {
            $post->likes()->create(['user_id' => $user->id]);
        }

        return back();
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
            'guest_name' => 'required|string|max:100',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $post = Post::findOrFail($id);

        $post->comments()->create([
            'body' => $request->body,
            'guest_name' => $request->guest_name,
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
        ]);

        return back()->with('success', 'Comment added!');
    }


}
