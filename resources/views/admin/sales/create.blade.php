@extends('layouts.app')

@section('title', 'Yangi sotuv')

@section('header', 'Yangi sotuv qo\'shish')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <form action="{{ route('admin.sales.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Mahsulot -->
                        <div>
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Mahsulot</label>
                            <select name="product_id" id="product_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">Mahsulotni tanlang</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} ({{ number_format($product->price, 2) }} so'm)
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Miqdori -->
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Miqdori</label>
                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" min="1" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('quantity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- To'lov turi -->
                        <div>
                            <label for="payment_type" class="block text-sm font-medium text-gray-700">To'lov turi</label>
                            <select name="payment_type" id="payment_type" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="cash" {{ old('payment_type') == 'cash' ? 'selected' : '' }}>Naqd pul</option>
                                <option value="card" {{ old('payment_type') == 'card' ? 'selected' : '' }}>Plastik karta</option>
                                <option value="transfer" {{ old('payment_type') == 'transfer' ? 'selected' : '' }}>O'tkazma</option>
                            </select>
                            @error('payment_type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Yakunlangan</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Kutilmoqda</option>
                                <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Bekor qilingan</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Mijoz nomi -->
                    <div class="mt-6">
                        <label for="customer_name" class="block text-sm font-medium text-gray-700">Mijoz nomi</label>
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('customer_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Izoh -->
                    <div class="mt-6">
                        <label for="notes" class="block text-sm font-medium text-gray-700">Izoh</label>
                        <textarea name="notes" id="notes" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('notes') }}</textarea>
                        @error('notes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Amallar -->
                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('admin.sales.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                            Bekor qilish
                        </a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Saqlash
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
