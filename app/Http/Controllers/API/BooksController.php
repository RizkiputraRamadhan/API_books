<?php

namespace App\Http\Controllers\API;

use App\Models\Books;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BooksController extends Controller
{
    public function index()
    {
        $books = Books::with('category')->get();

        return response()->json([
            'status' => 'success',
            'books' => $books,
        ], 200);
    }

    public function show($id)
    {
        $booksData = Books::with('category')->find($id);;

        if(!$booksData) {
            return response()->json([
                'status' => 'not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'books' => $booksData,
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1980|max:' . date('Y'),
            'price' => 'required|string|max:255',
            'total_page' => 'required|integer|max:255',
            'thickness' => 'required|string|max:255',
            'category_id' => 'required|integer|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image_url'] = url('storage/' . $imagePath);
        }

        $book = new Books($validatedData);

        $book->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'Book created successfully.',
            'book' => $book,
        ], 201);
    }



    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'release_year' => 'required|integer|min:1980|max:' . date('Y'),
            'price' => 'required|string|max:255',
            'total_page' => 'required|integer|max:255',
            'thickness' => 'required|string|max:255',
            'category_id' => 'required|integer|max:255',
        ]);

        $book = Books::findOrFail($id);
        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store('images', 'public');
            if ($book->image_url) {
                $oldFilename = pathinfo($book->image_url)['basename'];
                Storage::disk('public')->delete('images/' . $oldFilename);
            }
            $validatedData['image_url'] = url('storage/' . $newImagePath);
        }

        $book->update($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Book updated successfully.',
            'book' => $book,
        ], 200);
    }



    public function delete($id)
    {
        try {

            $books = Books::findOrFail($id);
            $books->delete();

            return response()->json([
                'status' => 'success',
                'msg' => 'Berhasil dihapus',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'not found',
            ], 404);
        }
    }
}
