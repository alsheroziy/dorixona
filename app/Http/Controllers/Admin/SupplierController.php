<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10);
        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,pending,inactive'
        ]);

        Supplier::create($validated);

        return redirect()->route('admin.suppliers')
            ->with('success', 'Yetkazib beruvchi muvaffaqiyatli qo\'shildi.');
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,pending,inactive'
        ]);

        $supplier->update($validated);

        return redirect()->route('admin.suppliers')
            ->with('success', 'Yetkazib beruvchi muvaffaqiyatli yangilandi.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('admin.suppliers')
            ->with('success', 'Yetkazib beruvchi muvaffaqiyatli o\'chirildi.');
    }
}
