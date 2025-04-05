<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search query from the request

        // If there is a search query, filter products by name
        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->latest()->get();
        } else {
            $products = Product::latest()->get(); // Fetch all products ordered by creation date
        }

        // Pass the products and search query to the view
        return view('products.index', compact('products', 'search'));
    }

    public function admin()
    {
        $products = Product::latest()->get();
        return view('products.admin', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Redirect to the admin panel instead of the product index
        return redirect()->route('products.admin')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($validated);

        // Redirect to the admin panel instead of the product index
        return redirect()->route('products.admin')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        // Redirect to the admin panel instead of the product index
        return redirect()->route('products.admin')->with('success', 'Product deleted successfully.');
    }
}
