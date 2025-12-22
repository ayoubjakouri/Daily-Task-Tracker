<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Create Category') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">{{ __('Welcome back!') }}</h3>
                    <p class="text-gray-600">{{ __("You're logged in! Start managing your tasks by creating categories and organizing your work.") }}</p>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Create Category Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-blue-100 rounded-md mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-center text-gray-900 mb-2">
                            {{ __('Create New Category') }}
                        </h3>
                        <p class="text-gray-600 text-center text-sm mb-4">
                            {{ __('Add a new category to organize your tasks') }}
                        </p>
                        <div class="text-center">
                            <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                                {{ __('Create Now') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- View All Categories Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-md mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-center text-gray-900 mb-2">
                            {{ __('View All Categories') }}
                        </h3>
                        <p class="text-gray-600 text-center text-sm mb-4">
                            {{ __('Browse and manage all your categories') }}
                        </p>
                        <div class="text-center">
                            <a href="{{ route('categories.index') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150">
                                {{ __('View All') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Category Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-purple-100 rounded-md mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-center text-gray-900 mb-2">
                            {{ __('Recent Categories') }}
                        </h3>
                        <p class="text-gray-600 text-center text-sm mb-4">
                            {{ __('View your most recently created categories') }}
                        </p>
                        <div class="text-center">
                            <a href="{{ route('categories.index') }}" class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition ease-in-out duration-150">
                                {{ __('View Recent') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats (Optional) -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-900">{{ __('Your Categories') }}</h4>
                    </div>
                    <div class="p-6">
                        @php
                            $categories = Auth::user()->categories()->latest()->take(5)->get();
                        @endphp
                        @if($categories->count())
                            <ul class="space-y-2">
                                @foreach($categories as $category)
                                    <li class="flex items-center justify-between p-2 hover:bg-gray-50 rounded">
                                        <span class="text-gray-900">{{ $category->name }}</span>
                                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            {{ __('Edit') }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="mt-4">
                                <a href="{{ route('categories.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    {{ __('View all') }} →
                                </a>
                            </div>
                        @else
                            <p class="text-gray-500 text-sm">{{ __('No categories yet. Create your first one!') }}</p>
                        @endif
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-900">{{ __('Quick Actions') }}</h4>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="{{ route('categories.create') }}" class="block px-4 py-2 text-center bg-blue-50 text-blue-700 rounded-md hover:bg-blue-100 transition">
                                {{ __('+ Create New Category') }}
                            </a>
                            <a href="{{ route('categories.index') }}" class="block px-4 py-2 text-center bg-green-50 text-green-700 rounded-md hover:bg-green-100 transition">
                                {{ __('📋 Manage Categories') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
