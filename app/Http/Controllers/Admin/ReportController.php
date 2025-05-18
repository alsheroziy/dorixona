<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        // Umumiy statistika
        $totalSales = Sale::sum('total_amount');
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        // So'nggi 7 kundagi sotuvlar
        $dailySales = Sale::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_amount) as total')
        )
        ->where('created_at', '>=', now()->subDays(7))
        ->groupBy('date')
        ->get();

        // Top mahsulotlar
        $topProducts = Product::withCount('sales')
            ->orderBy('sales_count', 'desc')
            ->take(5)
            ->get();

        // To'lov turlari bo'yicha statistika
        $paymentStats = Sale::select('payment_type', DB::raw('COUNT(*) as count'))
            ->groupBy('payment_type')
            ->get();

        return view('admin.reports.index', compact(
            'totalSales',
            'totalProducts',
            'totalCategories',
            'dailySales',
            'topProducts',
            'paymentStats'
        ));
    }

    public function sales(Request $request)
    {
        $query = Sale::with('product');

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->filled('payment_type')) {
            $query->where('payment_type', $request->payment_type);
        }

        $sales = $query->latest()->paginate(15);

        return view('admin.reports.sales', compact('sales'));
    }

    public function products(Request $request)
    {
        $query = Product::with(['category', 'supplier']);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('supplier_id')) {
            $query->where('supplier_id', $request->supplier_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $products = $query->latest()->paginate(15);
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('admin.reports.products', compact('products', 'categories', 'suppliers'));
    }
}
