@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold mb-4 text-gray-900">
                Daily Task Tracker 🚀
            </h1>
            <p class="text-xl text-gray-600 mb-8">
                Stay organized and productive with our simple task management system
            </p>
            <div class="flex gap-4 justify-center">
                <a href="#" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition">
                    Get Started
                </a>
                <a href="#" class="px-6 py-3 bg-gray-200 text-gray-900 rounded-lg font-semibold hover:bg-gray-300 transition">
                    Learn More
                </a>
            </div>
        </div>

        <!-- Features Section -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="p-6 bg-white rounded-lg shadow">
                <div class="text-3xl mb-3">✓</div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Easy Management</h3>
                <p class="text-gray-600">Create, organize, and manage your daily tasks effortlessly.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow">
                <div class="text-3xl mb-3">📊</div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Track Progress</h3>
                <p class="text-gray-600">Monitor your productivity and accomplishments in real-time.</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow">
                <div class="text-3xl mb-3">🎯</div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Stay Focused</h3>
                <p class="text-gray-600">Prioritize what matters and achieve your daily goals.</p>
            </div>
        </div>

        <!-- Tech Stack -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-8 rounded-lg">
            <h2 class="text-2xl font-bold mb-4 text-gray-900">Built With Modern Tech</h2>
            <p class="text-gray-700">
                Powered by <span class="font-semibold">Laravel 12</span> and styled with 
                <span class="font-semibold">Tailwind CSS v4</span> for a seamless experience.
            </p>
        </div>
    </div>
@endsection
