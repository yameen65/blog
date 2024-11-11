<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tittle' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create($request->all());
        // dd('save db', $request->all());

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        $post = Post::with('comments.user')->findOrFail($post->id);

        return view('posts.show', compact('post'));
    }
}
