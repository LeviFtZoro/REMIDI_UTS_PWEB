<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Semua user bisa lihat produk
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Admin buat produk
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->only(['name', 'description', 'price', 'stock']));

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    // Admin edit produk
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($request->only(['name', 'description', 'price', 'stock']));

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Admin hapus produk
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    // User beli produk
    public function buy(Product $product)
    {
        if ($product->stock > 0) {
            $product->decrement('stock');
            return redirect()->route('products.index')->with('success', 'Produk berhasil dibeli.');
        }

        return redirect()->route('products.index')->with('error', 'Stok produk habis.');
    }

    // Alias alternatif (opsional)
    public function beli($id)
    {
        $product = Product::findOrFail($id);

        if ($product->stock > 0) {
            $product->decrement('stock');
            return redirect()->back()->with('success', 'Produk berhasil dibeli.');
        }

        return redirect()->back()->with('error', 'Stok produk habis.');
    }
}