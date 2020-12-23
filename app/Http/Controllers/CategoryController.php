<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller
{

    public function index()
    {
        
        $categories = Category::orderBy('id', 'desc')
            ->paginate(8);

        return Inertia::render('Categories/Index', [
            'categories' => $categories
        ]);

    }

    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('categories.index')
            ->with('message', 'Category saved!');

    }

    public function edit($id)
    {
        $category = Category::find($id);

        return Inertia::render('Categories/Edit', ['category' => $category]);
    }


    public function update(Request $request, $id)
    {

        $category = Category::find($id);

        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')
            ->with('message', 'Category updated!');
            
    }

    public function destroy($id)
    {

        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')
            ->with('message', 'Category deleted!');

    }
}
