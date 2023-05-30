<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Retrieve all posts
        $posts = Post::all();

        // Pass the posts to the view for displaying
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Show the form for creating a new post
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate and store the newly created post
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::create($validatedData);

        // Redirect to the post's show page with a success message
        return redirect()->route('posts.show', $post->id)->with('success', 'Post created successfully');
    }

    public function show($id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Display the post's details
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Show the form for editing the post
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the specified post
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validatedData);

        // Redirect to the post's show page with a success message
        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        // Delete the specified post
        $post = Post::findOrFail($id);
        $post->delete();

        // Redirect to the index page with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
