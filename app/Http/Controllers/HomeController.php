<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Umumiy statistika
        $stats = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_suppliers' => Supplier::count(),
            'total_sales' => Sale::where('status', 'completed')->count(),
            'total_revenue' => Sale::where('status', 'completed')->sum('total_amount'),
        ];

        // So'nggi sotuvlar
        $recent_sales = Sale::with('product')
            ->latest()
            ->take(5)
            ->get();

        // Eng ko'p sotilgan mahsulotlar
        $top_products = Sale::where('status', 'completed')
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->with('product')
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->take(5)
            ->get();

        // Mahsulotlar statusi bo'yicha
        $product_status = [
            'active' => Product::where('status', 'active')->count(),
            'inactive' => Product::where('status', 'inactive')->count(),
            'low_stock' => Product::where('quantity', '<', 10)->count(),
        ];

        // Oylik sotuvlar statistikasi
        $monthly_sales = Sale::where('status', 'completed')
            ->whereYear('created_at', date('Y'))
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total_amount) as total')
            )
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('home', compact(
            'stats',
            'recent_sales',
            'top_products',
            'product_status',
            'monthly_sales'
        ));
    }
}
