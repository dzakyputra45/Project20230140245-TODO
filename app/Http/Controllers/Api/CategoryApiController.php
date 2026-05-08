<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

/**
 * @tags Category
 */
class CategoryApiController extends Controller
{
    /**
     * Display a listing of all categories.
     *
     * Returns all categories from the database.
     *
     * @response 200 {
     *   "message": "Categories retrieved successfully",
     *   "data": [
     *     {
     *       "id": 1,
     *       "nama_kategori": "Elektronik",
     *       "created_at": "2026-05-08T10:00:00.000000Z",
     *       "updated_at": "2026-05-08T10:00:00.000000Z"
     *     }
     *   ]
     * }
     */
    public function index()
    {
        $categories = Kategori::all();

        return response()->json([
            'message' => 'Categories retrieved successfully',
            'data' => $categories,
        ]);
    }

    /**
     * Store a newly created category.
     *
     * Creates a new category with the given name.
     *
     * @response 201 {
     *   "message": "Category created successfully",
     *   "data": {
     *     "id": 1,
     *     "nama_kategori": "Elektronik",
     *     "created_at": "2026-05-08T10:00:00.000000Z",
     *     "updated_at": "2026-05-08T10:00:00.000000Z"
     *   }
     * }
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $category = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return response()->json([
            'message' => 'Category created successfully',
            'data' => $category,
        ], 201);
    }

    /**
     * Display the specified category.
     *
     * Returns details of a single category by its ID.
     *
     * @response 200 {
     *   "message": "Category retrieved successfully",
     *   "data": {
     *     "id": 1,
     *     "nama_kategori": "Elektronik",
     *     "created_at": "2026-05-08T10:00:00.000000Z",
     *     "updated_at": "2026-05-08T10:00:00.000000Z"
     *   }
     * }
     */
    public function show(Kategori $category)
    {
        return response()->json([
            'message' => 'Category retrieved successfully',
            'data' => $category,
        ]);
    }

    /**
     * Update the specified category.
     *
     * Updates an existing category's name.
     *
     * @response 200 {
     *   "message": "Category updated successfully",
     *   "data": {
     *     "id": 1,
     *     "nama_kategori": "Elektronik Updated",
     *     "created_at": "2026-05-08T10:00:00.000000Z",
     *     "updated_at": "2026-05-08T12:00:00.000000Z"
     *   }
     * }
     */
    public function update(Request $request, Kategori $category)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $category->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category,
        ]);
    }

    /**
     * Remove the specified category.
     *
     * Deletes a category from the database.
     *
     * @response 200 {
     *   "message": "Category deleted successfully"
     * }
     */
    public function destroy(Kategori $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
        ]);
    }
}
