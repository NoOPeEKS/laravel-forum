<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        Comment::create([
            ...$request->validate(['body' => ['required', 'string', 'max:2500']]),
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
        ]);
        return to_route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        $data = $request->validate(['body' => ['required', 'string', 'max:2500']]);

        $comment->update($data);

        return to_route('posts.show', ['post' => $comment->post_id, 'page' => $request->query('page')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return to_route('posts.show', ['post' => $comment->post_id, 'page' => $request->query('page')]);
    }
}
