<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'supplier'])->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        $suppliers = Supplier::where('status', 'active')->get();
        return view('admin.products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'status' => 'required|in:active,inactive'
        ]);

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Mahsulot muvaffaqiyatli qo\'shildi.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('status', 'active')->get();
        $suppliers = Supplier::where('status', 'active')->get();
        return view('admin.products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'status' => 'required|in:active,inactive'
        ]);

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Mahsulot muvaffaqiyatli yangilandi.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Mahsulot muvaffaqiyatli o\'chirildi.');
    }
}
