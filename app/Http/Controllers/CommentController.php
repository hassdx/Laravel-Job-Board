<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return redirect(to: '/blog');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return redirect(to: '/blog');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $post = Post::findOrFail($request->input('post_id'));
        $comment = new Comment();
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');
        $comment->save();


        return redirect("/blog/{$post->id}")->with('success', 'Comment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);

        return view('comment.show', ['comment' => $comment,'pageTitle' => $comment->author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('comment.edit', ['pageTitle' => 'Comment - edit Comment']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //@todo: will be cmplited in the forms sections
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //@todo: will be cmplited in the forms sections
    }
}
