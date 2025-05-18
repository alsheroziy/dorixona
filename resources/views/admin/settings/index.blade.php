@extends('layouts.app')

@section('title', 'Sozlamalar')

@section('header', 'Sozlamalar')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- General Settings -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Umumiy sozlamalar</h3>
            </div>
            <div class="p-6">
                <form>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Apteka nomi</label>
                            <input type="text" class="mt-1 block w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Manzil</label>
                            <input type="text" class="mt-1 block w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Telefon</label>
                            <input type="tel" class="mt-1 block w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" class="mt-1 block w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Notification Settings -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Bildirishnomalar</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">Kam qolgan mahsulotlar haqida</h4>
                            <p class="text-sm text-gray-500">Mahsulotlar kam qolganda xabar berish</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">Yangi buyurtmalar</h4>
                            <p class="text-sm text-gray-500">Yangi buyurtma kelganda xabar berish</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Backup Settings -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
            <div class="p-6 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Zaruriy nusxalar</h3>
            </div>
            <div class="p-6">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Avtomatik nusxa olish</label>
                        <select class="mt-1 block w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Har kuni</option>
                            <option>Har hafta</option>
                            <option>Har oy</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nusxalarni saqlash muddati</label>
                        <select class="mt-1 block w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>1 oy</option>
                            <option>3 oy</option>
                            <option>6 oy</option>
                            <option>1 yil</option>
                        </select>
                    </div>
                    <div>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Hozirgi nusxani yaratish
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end">
            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Saqlash
            </button>
        </div>
    </div>
@endsection
