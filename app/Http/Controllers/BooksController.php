<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return view('books.index', compact('books'));
    }

    public function edit(Books $books)
    {
        return view('books.edit', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image_url' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1980|max:' . date('Y'),
            'price' => 'required|string|max:255',
            'total_page' => 'required|integer|max:255',
            'thickness' => 'required|string|max:255',
            'category_id' => 'required|integer|max:255',
        ]);


        $post = new Books($validatedData);
        $post->save();

        return redirect()->route('books-index')->with('success', 'Books created successfully.');
    }

    public function delete(Books $books)
    {
        $books->delete();
        return redirect()->route('books-index')->with('success', 'Books deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image_url' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1980|max:' . date('Y'),
            'price' => 'required|string|max:255',
            'total_page' => 'required|integer|max:255',
            'thickness' => 'required|string|max:255',
            'category_id' => 'required|integer|max:255',
        ]);

        $book = Books::findOrFail($id);

        $book->update($validatedData);

        return $book;
    }
}
