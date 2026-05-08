<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @tags Product
 */
class ProductApiController extends Controller
{
    /**
     * Display a listing of all products.
     *
     * Returns all products with their associated user and category data.
     *
     * @response 200 {
     *   "message": "Products retrieved successfully",
     *   "data": [
     *     {
     *       "id": 1,
     *       "user_id": 1,
     *       "kategori_id": 1,
     *       "nama_produk": "Laptop Asus",
     *       "stok": 10,
     *       "harga": 15000000,
     *       "created_at": "2026-05-08T10:00:00.000000Z",
     *       "updated_at": "2026-05-08T10:00:00.000000Z",
     *       "user": { "id": 1, "name": "Admin" },
     *       "kategori": { "id": 1, "nama_kategori": "Elektronik" }
     *     }
     *   ]
     * }
     */
    public function index()
    {
        $products = Product::with(['user', 'kategori'])->get();

        return response()->json([
            'message' => 'Products retrieved successfully',
            'data' => $products,
        ]);
    }

    /**
     * Store a newly created product in storage.
     *
     * Creates a new product. The authenticated user is automatically set as the owner.
     *
     * @response 201 {
     *   "message": "Product created successfully",
     *   "data": {
     *     "id": 1,
     *     "user_id": 1,
     *     "kategori_id": 1,
     *     "nama_produk": "Laptop Asus",
     *     "stok": 10,
     *     "harga": 15000000,
     *     "created_at": "2026-05-08T10:00:00.000000Z",
     *     "updated_at": "2026-05-08T10:00:00.000000Z",
     *     "user": { "id": 1, "name": "Admin" },
     *     "kategori": { "id": 1, "nama_kategori": "Elektronik" }
     *   }
     * }
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'kategori_id' => 'nullable|exists:kategoris,id',
        ]);

        $product = Product::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'user_id' => $request->user()->id,
        ]);

        $product->load(['user', 'kategori']);

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product,
        ], 201);
    }

    /**
     * Display the specified product.
     *
     * Returns a single product with its associated user and category.
     *
     * @response 200 {
     *   "message": "Product retrieved successfully",
     *   "data": {
     *     "id": 1,
     *     "user_id": 1,
     *     "kategori_id": 1,
     *     "nama_produk": "Laptop Asus",
     *     "stok": 10,
     *     "harga": 15000000,
     *     "created_at": "2026-05-08T10:00:00.000000Z",
     *     "updated_at": "2026-05-08T10:00:00.000000Z",
     *     "user": { "id": 1, "name": "Admin" },
     *     "kategori": { "id": 1, "nama_kategori": "Elektronik" }
     *   }
     * }
     */
    public function show(Product $product)
    {
        $product->load(['user', 'kategori']);

        return response()->json([
            'message' => 'Product retrieved successfully',
            'data' => $product,
        ]);
    }

    /**
     * Update the specified product in storage.
     *
     * Updates an existing product's details.
     *
     * @response 200 {
     *   "message": "Product updated successfully",
     *   "data": {
     *     "id": 1,
     *     "user_id": 1,
     *     "kategori_id": 2,
     *     "nama_produk": "Laptop Asus Updated",
     *     "stok": 15,
     *     "harga": 16000000,
     *     "created_at": "2026-05-08T10:00:00.000000Z",
     *     "updated_at": "2026-05-08T12:00:00.000000Z",
     *     "user": { "id": 1, "name": "Admin" },
     *     "kategori": { "id": 2, "nama_kategori": "Gadget" }
     *   }
     * }
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'kategori_id' => 'nullable|exists:kategoris,id',
        ]);

        $product->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
        ]);

        $product->load(['user', 'kategori']);

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified product from storage.
     *
     * Deletes a product from the database.
     *
     * @response 200 {
     *   "message": "Product deleted successfully"
     * }
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
        ]);
    }
}
