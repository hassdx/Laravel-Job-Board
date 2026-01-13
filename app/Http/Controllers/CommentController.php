<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comment::orderBy('created_at')->cursorPaginate(5);

        return view('comment.index', ['comments' => $data,'pageTitle' => 'Comments']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.create', ['pageTitle' => 'Comment - Create New Comment']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //@todo: will be cmplited in the forms sections
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
