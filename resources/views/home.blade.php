@extends('layouts.app')

@section('title', 'Bosh sahifa')

@section('header', 'Bosh sahifa')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Statistika kartalari -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
        <!-- Jami mahsulotlar -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-box text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Jami mahsulotlar</h3>
                    <p class="text-2xl font-semibold text-gray-800">{{ $stats['total_products'] }}</p>
                </div>
            </div>
        </div>

        <!-- Jami kategoriyalar -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fas fa-tags text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Jami kategoriyalar</h3>
                    <p class="text-2xl font-semibold text-gray-800">{{ $stats['total_categories'] }}</p>
                </div>
            </div>
        </div>

        <!-- Jami yetkazib beruvchilar -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <i class="fas fa-truck text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Jami yetkazib beruvchilar</h3>
                    <p class="text-2xl font-semibold text-gray-800">{{ $stats['total_suppliers'] }}</p>
                </div>
            </div>
        </div>

        <!-- Jami sotuvlar -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <i class="fas fa-shopping-cart text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Jami sotuvlar</h3>
                    <p class="text-2xl font-semibold text-gray-800">{{ $stats['total_sales'] }}</p>
                </div>
            </div>
        </div>

        <!-- Jami tushum -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 text-red-600">
                    <i class="fas fa-money-bill-wave text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Jami tushum</h3>
                    <p class="text-2xl font-semibold text-gray-800">{{ number_format($stats['total_revenue'], 2) }} so'm</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- So'nggi sotuvlar -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">So'nggi sotuvlar</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mahsulot</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Miqdori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Summa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sana</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($recent_sales as $sale)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $sale->product->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $sale->quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ number_format($sale->total_amount, 2) }} so'm
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $sale->created_at->format('d.m.Y H:i') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Eng ko'p sotilgan mahsulotlar -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Eng ko'p sotilgan mahsulotlar</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mahsulot</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sotilgan miqdori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jami summa</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($top_products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $product->product->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $product->total_quantity }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ number_format($product->total_quantity * $product->product->price, 2) }} so'm
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Mahsulotlar statusi -->
    <div class="mt-6 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Mahsulotlar statusi</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-green-100 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-200 text-green-600">
                            <i class="fas fa-check text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm">Faol mahsulotlar</h3>
                            <p class="text-2xl font-semibold text-gray-800">{{ $product_status['active'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-yellow-100 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-200 text-yellow-600">
                            <i class="fas fa-exclamation-triangle text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm">Kam qolgan mahsulotlar</h3>
                            <p class="text-2xl font-semibold text-gray-800">{{ $product_status['low_stock'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-red-100 rounded-lg p-4">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-200 text-red-600">
                            <i class="fas fa-times text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-gray-500 text-sm">Nofaol mahsulotlar</h3>
                            <p class="text-2xl font-semibold text-gray-800">{{ $product_status['inactive'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Oylik sotuvlar statistikasi -->
    <div class="mt-6 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Oylik sotuvlar statistikasi</h2>
            <div class="h-64">
                <canvas id="monthlySalesChart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('monthlySalesChart').getContext('2d');
    const monthlyData = @json($monthly_sales);

    const months = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentabr', 'Oktabr', 'Noyabr', 'Dekabr'];
    const salesData = Array(12).fill(0);

    monthlyData.forEach(item => {
        salesData[item.month - 1] = item.total;
    });

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Oylik tushum',
                data: salesData,
                borderColor: 'rgb(59, 130, 246)',
                tension: 0.1,
                fill: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + ' so\'m';
                        }
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection
