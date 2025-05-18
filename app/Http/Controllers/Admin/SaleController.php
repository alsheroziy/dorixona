<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->latest()->paginate(10);
        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::where('status', 'active')->get();
        return view('admin.sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_type' => 'required|in:cash,card,transfer',
            'status' => 'required|in:completed,pending,cancelled',
            'customer_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $validated['total_amount'] = $product->price * $validated['quantity'];

        $sale = Sale::create($validated);

        if ($validated['status'] === 'completed') {
            $product->decrement('quantity', $validated['quantity']);
        }

        return redirect()->route('admin.sales')
            ->with('success', 'Sotuv muvaffaqiyatli qo\'shildi');
    }

    public function edit(Sale $sale)
    {
        $products = Product::where('status', 'active')->get();
        return view('admin.sales.edit', compact('sale', 'products'));
    }

    public function update(Request $request, Sale $sale)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment_type' => 'required|in:cash,card,transfer',
            'status' => 'required|in:completed,pending,cancelled',
            'customer_name' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $validated['total_amount'] = $product->price * $validated['quantity'];

        // Agar status o'zgartirilgan bo'lsa
        if ($sale->status !== $validated['status']) {
            if ($sale->status === 'completed' && $validated['status'] !== 'completed') {
                // Agar oldingi status completed bo'lsa va yangi status completed bo'lmasa
                $product->increment('quantity', $sale->quantity);
            } elseif ($sale->status !== 'completed' && $validated['status'] === 'completed') {
                // Agar oldingi status completed bo'lmasa va yangi status completed bo'lsa
                $product->decrement('quantity', $validated['quantity']);
            }
        } elseif ($sale->status === 'completed') {
            // Agar status o'zgarmagan bo'lsa va completed bo'lsa
            $quantityDiff = $sale->quantity - $validated['quantity'];
            if ($quantityDiff > 0) {
                $product->increment('quantity', $quantityDiff);
            } elseif ($quantityDiff < 0) {
                $product->decrement('quantity', abs($quantityDiff));
            }
        }

        $sale->update($validated);

        return redirect()->route('admin.sales')
            ->with('success', 'Sotuv muvaffaqiyatli yangilandi');
    }

    public function destroy(Sale $sale)
    {
        if ($sale->status === 'completed') {
            $product = Product::findOrFail($sale->product_id);
            $product->increment('quantity', $sale->quantity);
        }

        $sale->delete();

        return redirect()->route('admin.sales')
            ->with('success', 'Sotuv muvaffaqiyatli o\'chirildi');
    }
}
