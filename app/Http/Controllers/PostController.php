<?php

namespace App\Http\Controllers;

// Models
use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Carbon\Carbon;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('category')
            ->orderBy('id', 'desc')
            ->paginate(8);

        return Inertia::render('Posts/Index', [
            'posts' => $posts
        ]);
    }

    public function getCategories(Request $request)
    {
        // if (!$request->ajax()) {
        //     return redirect('/');
        // }

        $categories = Category::orderBy('name', 'asc')
            ->select('id', 'name')
            ->get();
        
        return response()->json($categories, 200);
    }

    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    public function store(Request $request)
    {
    
        $title       =  $request->input('title');
        $slug        =  Str::slug($title, '-');
        $body        =  $request->input('body');
        $categoryId  =  $request->input('category_id');

        $post                =  new Post();
        $post->title         =  $title;
        $post->slug          =  $slug;
        $post->body          =  $body;
        $post->published_at  =  Carbon::now();

        $category            =  Category::find($categoryId);
        
        $post->category()->associate($category);
        $post->save();

        return redirect()->route('posts.index')
            ->with('message', 'Post saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
