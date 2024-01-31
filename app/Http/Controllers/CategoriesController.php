<?php

namespace App\Http\Controllers;

use App\Models\Categoreis;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $post = new Categories($validatedData);
        $post->save();

        return redirect()->route('categories-index')->with('success', 'Category created successfully.');
    }

    public function edit(Categories $categories)
    {
        return view('categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name,' . $id . '|max:255',
        ]);
        $category = Categories::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('categories-index')->with('success', 'Category updated successfully.');
    }

    public function delete(Categories $categories)
    {
        $categories->delete();
        return redirect()->route('categories-index')->with('success', 'Category deleted successfully.');
    }
}
