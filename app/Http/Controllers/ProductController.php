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
        Product::create($request->only(['name', 'description', 'price', 'stock']));
        return redirect()->route('admin.products.index');
    }

    // User beli produk
    public function buy(Product $product)
    {
        if ($product->stock > 0) {
            $product->decrement('stock');
        }
        return redirect()->route('products.index');
    }

    public function beli($id)
    {
        $product = Product::findOrFail($id);

        // Misal logika pembelian:
        if ($product->stock > 0) {
            $product->stock -= 1;
            $product->save();

            return redirect()->back()->with('success', 'Produk berhasil dibeli.');
        }

        return redirect()->back()->with('error', 'Stok produk habis.');
    }
}
