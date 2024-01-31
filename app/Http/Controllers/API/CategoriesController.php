<?php

namespace App\Http\Controllers\API;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return response()->json([
            'status' => 'success',
            'msg' => 'Data Berhasil Ditampilkan',
            'categories' => $categories,
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Categories($validatedData);

        $category->save();


        return response()->json([
            'status' => 'success',
            'message' => 'Category created successfully.',
            'categories' => $category,
        ], 201);
    }

    public function show($id)
    {
        $categoryData = Categories::find($id);

        if(!$categoryData) {
            return response()->json([
                'status' => 'not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'categories' => $categoryData,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
            ]);

            $category = Categories::findOrFail($id);
            $category->update($validatedData);

            return response()->json([
                'status' => 'success',
                'categories' => $category,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'not found',
            ], 404);
        }
    }

    public function delete($id)
    {
        try {

            $category = Categories::findOrFail($id);
            $category->delete();

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
