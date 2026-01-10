<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    protected $table = 'comment';

    // Show comments list
    function index()
    {
        $data = Comment::orderBy('created_at')->cursorPaginate(5);

        return view('comment.index', [
            'comments' => $data,
            'pageTitle' => 'Blog'
        ]);
    }

    // Show single comment
    function show($id)
    {
        $comment = Comment::find($id);

        return view('comment.show', [
            'comments' => $comment,
            'pageTitle' => $comment->author
        ]);
    }

    // Create comments (test / factory)
    function create()
    {
        Comment::factory(20)->create();

        return redirect('/comments');
    }

    // Delete a comment
    function delete($id)
    {
        Comment::destroy($id);

        return redirect('/comments');
    }
}
