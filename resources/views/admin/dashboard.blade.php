@extends('layouts.app')

@section('title', 'Bosh sahifa')

@section('header', 'Bosh sahifa')

@section('content')
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-blue-50 p-6 rounded-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Bugungi sotuvlar</p>
                    <h3 class="text-2xl font-bold text-gray-800">2,500,000 so'm</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-shopping-cart text-blue-600"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-600 text-sm"><i class="fas fa-arrow-up"></i> 12%</span>
                <span class="text-gray-600 text-sm ml-2">O'tgan haftaga nisbatan</span>
            </div>
        </div>

        <div class="bg-green-50 p-6 rounded-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Mahsulotlar</p>
                    <h3 class="text-2xl font-bold text-gray-800">1,234</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-pills text-green-600"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-600 text-sm"><i class="fas fa-arrow-up"></i> 5%</span>
                <span class="text-gray-600 text-sm ml-2">O'tgan oyga nisbatan</span>
            </div>
        </div>

        <div class="bg-yellow-50 p-6 rounded-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Yetkazib beruvchilar</p>
                    <h3 class="text-2xl font-bold text-gray-800">45</h3>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="fas fa-truck text-yellow-600"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-600 text-sm"><i class="fas fa-arrow-up"></i> 3%</span>
                <span class="text-gray-600 text-sm ml-2">O'tgan oyga nisbatan</span>
            </div>
        </div>

        <div class="bg-purple-50 p-6 rounded-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Mijozlar</p>
                    <h3 class="text-2xl font-bold text-gray-800">789</h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <i class="fas fa-users text-purple-600"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-600 text-sm"><i class="fas fa-arrow-up"></i> 8%</span>
                <span class="text-gray-600 text-sm ml-2">O'tgan oyga nisbatan</span>
            </div>
        </div>
    </div>

    <!-- Recent Sales and Low Stock -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Sales -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold text-gray-800">So'nggi sotuvlar</h3>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-4 py-3">Mahsulot</th>
                                <th class="px-4 py-3">Miqdor</th>
                                <th class="px-4 py-3">Narx</th>
                                <th class="px-4 py-3">Vaqt</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3">Paracetamol</td>
                                <td class="px-4 py-3">2</td>
                                <td class="px-4 py-3">25,000 so'm</td>
                                <td class="px-4 py-3">10:30</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Aspirin</td>
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3">15,000 so'm</td>
                                <td class="px-4 py-3">10:25</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Vitamin C</td>
                                <td class="px-4 py-3">3</td>
                                <td class="px-4 py-3">45,000 so'm</td>
                                <td class="px-4 py-3">10:20</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Low Stock Products -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Kam qolgan mahsulotlar</h3>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <th class="px-4 py-3">Mahsulot</th>
                                <th class="px-4 py-3">Qoldiq</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Amallar</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3">Paracetamol</td>
                                <td class="px-4 py-3">5</td>
                                <td class="px-4 py-3"><span class="px-2 py-1 text-xs font-semibold text-red-600 bg-red-100 rounded-full">Kam</span></td>
                                <td class="px-4 py-3">
                                    <button class="text-blue-600 hover:text-blue-800">Buyurtma</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Aspirin</td>
                                <td class="px-4 py-3">3</td>
                                <td class="px-4 py-3"><span class="px-2 py-1 text-xs font-semibold text-red-600 bg-red-100 rounded-full">Kam</span></td>
                                <td class="px-4 py-3">
                                    <button class="text-blue-600 hover:text-blue-800">Buyurtma</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">Vitamin C</td>
                                <td class="px-4 py-3">7</td>
                                <td class="px-4 py-3"><span class="px-2 py-1 text-xs font-semibold text-yellow-600 bg-yellow-100 rounded-full">Normal</span></td>
                                <td class="px-4 py-3">
                                    <button class="text-blue-600 hover:text-blue-800">Buyurtma</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
