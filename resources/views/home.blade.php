<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Daily Task Tracker') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-900 text-white">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="border-b border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="text-2xl font-bold text-blue-400">
                        Daily Task Tracker
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('login') }}" class="px-4 py-2 text-gray-300 hover:text-white transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                            Register
                        </a>    
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <!-- Hero Section -->
                <div class="text-center mb-16">
                    <h1 class="text-6xl font-bold mb-4 bg-gradient-to-r from-blue-400 to-indigo-600 bg-clip-text text-transparent">
                        Daily Task Tracker 🚀
                    </h1>
                    <p class="text-2xl text-gray-400 mb-8 max-w-2xl mx-auto">
                        Stay organized and productive with our simple task management system
                    </p>
                    <div class="flex gap-4 justify-center">
                        <a href="{{ route('register') }}" class="px-8 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                            Get Started
                        </a>
                        <a href="{{ route('login') }}" class="px-8 py-3 border border-gray-600 text-gray-300 rounded-lg font-semibold hover:border-gray-400 transition">
                            Sign In
                        </a>   
                    </div>
                </div>

                <!-- Features Section -->
                <div class="grid md:grid-cols-3 gap-8 mb-16">
                    <div class="p-8 bg-gray-800 rounded-lg border border-gray-700 hover:border-blue-500 transition">
                        <div class="text-4xl mb-4">✓</div>
                        <h3 class="text-2xl font-bold mb-3">Easy Management</h3>
                        <p class="text-gray-400">Create, organize, and manage your daily tasks effortlessly with an intuitive interface.</p>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-lg border border-gray-700 hover:border-blue-500 transition">
                        <div class="text-4xl mb-4">📊</div>
                        <h3 class="text-2xl font-bold mb-3">Track Progress</h3>
                        <p class="text-gray-400">Monitor your productivity and accomplishments in real-time with detailed insights.</p>
                    </div>
                    <div class="p-8 bg-gray-800 rounded-lg border border-gray-700 hover:border-blue-500 transition">
                        <div class="text-4xl mb-4">🎯</div>
                        <h3 class="text-2xl font-bold mb-3">Stay Focused</h3>
                        <p class="text-gray-400">Prioritize what matters and achieve your daily goals with structured categories.</p>
                    </div>
                </div>

                <!-- Tech Stack -->
                <div class="bg-gradient-to-r from-blue-900 to-indigo-900 p-12 rounded-lg border border-blue-800">
                    <h2 class="text-3xl font-bold mb-4">Built With Modern Tech</h2>
                    <p class="text-gray-300 text-lg">
                        Powered by <span class="font-semibold text-blue-400">Laravel 12</span> and styled with 
                        <span class="font-semibold text-blue-400">Tailwind CSS v4</span> for a seamless, modern experience.
                    </p>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="border-t border-gray-800 py-8 mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-400">
                    &copy; {{ date('Y') }} Daily Task Tracker. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>