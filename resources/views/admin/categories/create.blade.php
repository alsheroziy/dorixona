@extends('layouts.app')

@section('title', 'Yangi kategoriya')

@section('header', 'Yangi kategoriya qo\'shish')

@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kategoriya nomi -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Kategoriya nomi</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Faol</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Nofaol</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Tavsif -->
                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Tavsif</label>
                        <textarea name="description" id="description" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Amallar -->
                    <div class="mt-6 flex justify-end space-x-3">
                        <a href="{{ route('admin.categories.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
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
