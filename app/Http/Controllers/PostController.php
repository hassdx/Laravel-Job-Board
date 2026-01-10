<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    protected $table = 'post';
    function index(){
        $data = Post:: cursorPaginate(5);
        return view('post.index', ['posts' => $data, 'pageTitle' => 'Blog']); // Fixed: 'pageTitle' in quotes
    }

    function show($id){
        $post = Post::find($id);

        return view('post.show', ['post' => $post, 'pageTitle' => $post->title]); // Fixed: 'pageTitle' in quotes
    }

    function create(){
        // $post = Post::create([
        //     'title' => 'My find unique post',
        //     'body' => 'This is to test find.',
        //     'author' => 'Admin',
        //     'published' => false
        // ]);

        Post::factory(100)->create();

        return redirect('/blog');
    }

    function delete(){
        Post::destroy(13);
    }
}
