<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Post;

use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    function index()
    {
        $data = Tag::cursorPaginate(10);
        return view('tags.index', ['tags' => $data, "pageTitle" => "Tags"]);
    }


    function create()
    {
    //     Tag::create([
    //         'title' => 'Software engineering',

    //     ]
    
    // );

    Tag::factory(10)->create();

        return redirect('/tags');

    }

    function testManyToMany()
    {
        $post1 = Post::first(); // Safer than findOrFail(2) if the DB is fresh
        $tag = Tag::first();
    
        if ($post1 && $tag) {
            // Use the actual ULID string from the tag object
            $post1->tags()->attach($tag->id); 
        }
    
        return response()->json([
            'post' => $post1->title ?? 'No post',
            'tags' => $post1->tags ?? []
        ]);
    }

}
