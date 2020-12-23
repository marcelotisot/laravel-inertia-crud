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

        if (!$request->ajax()) {
            return redirect('/');
        }

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

    public function show($id)
    {

        $post = Post::with('category')
            ->where('id', '=', $id)
            ->get();

        return Inertia::render('Posts/Show', ['post' => $post]);

    }

    public function edit($id)
    {

        $post = Post::find($id);

        return Inertia::render('Posts/Edit', ['post' => $post]);

    }

    public function update(Request $request, $id)
    {

        $title       =  $request->input('title');
        $slug        =  Str::slug($title, '-');
        $body        =  $request->input('body');
        $categoryId  =  $request->input('category_id');

        $post                =  Post::find($id);
        $post->title         =  $title;
        $post->slug          =  $slug;
        $post->body          =  $body;
        $post->published_at  =  Carbon::now();

        $category            =  Category::find($categoryId);
        
        $post->category()->associate($category);
        $post->save();

        return redirect()->route('posts.index')
            ->with('message', 'Post updated!');

    }

    public function destroy($id)
    {

        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('message', 'Post deleted!');

    }
}
