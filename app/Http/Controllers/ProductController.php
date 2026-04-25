<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $users = User::whereIn('role', ['user', 'admin'])->get();
        $categories = Kategori::all();

        return view('product.create', compact('users', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'user_id' => 'required|exists:users,id'
        ]);

        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('product');
    }

    public function show(Product $product)
    {
        return view('product.view', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Kategori::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $product->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('product');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product');
    }
}