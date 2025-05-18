<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Dorixona</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <div class="p-4">
                <h1 class="text-2xl font-bold text-blue-600">Dorixona</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-home mr-2"></i> Bosh sahifa
                </a>
                <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-pills mr-2"></i> Mahsulotlar
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-tags mr-2"></i> Kategoriyalar
                </a>
                <a href="{{ route('admin.sales.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-shopping-cart mr-2"></i> Sotuvlar
                </a>
                <a href="{{ route('admin.suppliers.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-truck mr-2"></i> Yetkazib beruvchilar
                </a>
                <a href="{{ route('admin.reports') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-chart-bar mr-2"></i> Hisobotlar
                </a>
                <a href="{{ route('admin.settings') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                    <i class="fas fa-cog mr-2"></i> Sozlamalar
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Top Navigation -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">@yield('header')</h2>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Qidirish..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-gray-700">Admin</span>
                        <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff" alt="Admin" class="w-8 h-8 rounded-full">
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Content -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
