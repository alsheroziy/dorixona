@extends('layouts.app')

@section('title', 'Hisobotlar')

@section('header', 'Hisobotlar')

@section('content')
    <!-- Date Range Selector -->
    <div class="mb-6 flex justify-between items-center">
        <div class="flex space-x-4">
            <input type="date" class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="date" class="border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                Ko'rsatish
            </button>
        </div>
        <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 flex items-center">
            <i class="fas fa-file-export mr-2"></i> Export
        </button>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Jami sotuv</h3>
            <p class="text-3xl font-bold text-blue-600">25,000,000 so'm</p>
            <p class="text-sm text-gray-600 mt-2">Oxirgi 30 kun</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Sotilgan mahsulotlar</h3>
            <p class="text-3xl font-bold text-green-600">450</p>
            <p class="text-sm text-gray-600 mt-2">Oxirgi 30 kun</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">O'rtacha chek</h3>
            <p class="text-3xl font-bold text-purple-600">55,555 so'm</p>
            <p class="text-sm text-gray-600 mt-2">Oxirgi 30 kun</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Foydalik</h3>
            <p class="text-3xl font-bold text-yellow-600">5,000,000 so'm</p>
            <p class="text-sm text-gray-600 mt-2">Oxirgi 30 kun</p>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Sales Chart -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Sotuvlar statistikasi</h3>
            <div class="h-64">
                <!-- Chart will be rendered here -->
                <div class="w-full h-full flex items-center justify-center text-gray-500">
                    Sotuvlar grafigi
                </div>
            </div>
        </div>

        <!-- Products Chart -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Top mahsulotlar</h3>
            <div class="h-64">
                <!-- Chart will be rendered here -->
                <div class="w-full h-full flex items-center justify-center text-gray-500">
                    Mahsulotlar grafigi
                </div>
            </div>
        </div>
    </div>

    <!-- Top Products Table -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Eng ko'p sotilgan mahsulotlar</h3>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Mahsulot
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Sotilgan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Jami summa
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Foydalik
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    Paracetamol
                                </div>
                                <div class="text-sm text-gray-500">
                                    #12345
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        150
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        3,750,000 so'm
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        750,000 so'm
                    </td>
                </tr>
                <!-- More rows... -->
            </tbody>
        </table>
    </div>
@endsection
