<x-app-layout>
    {{-- Header --}}
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <div class="flex gap-2">
                <a href="{{ route('categories.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white text-xs font-semibold rounded hover:bg-blue-700">
                    {{ __('Create Category') }}
                </a>

                <a href="{{ route('tasks.create') }}"
                    class="px-4 py-2 bg-green-600 text-white text-xs font-semibold rounded hover:bg-green-700">
                    {{ __('Create Task') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Welcome --}}
            <div class="bg-white shadow rounded p-6">
                <h3 class="text-lg font-semibold mb-1">
                    {{ __('Welcome back, :name!', ['name' => Auth::user()->name]) }}
                </h3>
                <p class="text-gray-600 text-sm">
                    {{ __("Here's a quick overview of your tasks.") }}
                </p>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded shadow">
                    <p class="text-gray-500 text-sm">Total Tasks</p>
                    <p class="text-3xl font-bold">{{ $totalTasks }}</p>
                </div>

                <div class="bg-green-100 p-6 rounded shadow">
                    <p class="text-gray-600 text-sm">Completed Today</p>
                    <p class="text-3xl font-bold text-green-700">{{ $completedToday }}</p>
                </div>

                <div class="bg-red-100 p-6 rounded shadow">
                    <p class="text-gray-600 text-sm">Overdue Tasks</p>
                    <p class="text-3xl font-bold text-red-700">{{ $overdueTasks }}</p>
                </div>
            </div>

            {{-- Recent Categories --}}
            <div class="bg-white shadow rounded">
                <div class="px-6 py-4 border-b">
                    <h4 class="font-semibold">Recent Categories</h4>
                </div>
                <div class="p-6">
                    @forelse($recentCategories as $category)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0 flex-1">
                                <div>
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $category->name }}
                                    </p>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ __('Created') }} {{ $category->created_at->format('M d, Y') }}
                                    </p>
                                </div>
                            </div>
                            <div class="ml-4 flex flex-shrink-0 gap-2">
                                <a href="{{ route('tasks.index', ['category' => $category->id]) }}"
                                    class="inline-flex items-center  text-sm leading-4 font-medium text-green-600 hover:text-green-700 transition ease-in-out duration-150">
                                    {{ __('Tasks') }}
                                </a>
                                <a href="{{ route('categories.edit', $category) }}"
                                    class="inline-flex items-center t text-sm leading-4 font-medium rounded-md text-blue-600  hover:text-blue-700  transition ease-in-out duration-150">
                                    {{ __('Edit') }}
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline"
                                    onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center t text-sm leading-4 font-medium rounded-md text-red-600  hover:text-red-700  transition ease-in-out duration-150">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">
                            No categories yet.
                        </p>
                    @endforelse
                </div>
            </div>

            {{-- Recent Tasks --}}
            <div class="bg-white shadow rounded">
                <div class="px-6 py-4 border-b">
                    <h4 class="font-semibold">Recent Tasks</h4>
                </div>
                <div class="p-6">
                    @forelse($recentTasks as $task)
                        <div class="flex justify-between items-center py-2 border-b last:border-0">
                            <span>{{ $task->title }}</span>
                            <span class="text-xs text-gray-500">
                                {{ optional($task->due_date)->format('Y-m-d') }}
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">
                            No tasks yet.
                        </p>
                    @endforelse
                </div>
            </div>
            {{-- Categories & Tasks --}}
            <div class="bg-white shadow rounded">
                <div class="px-6 py-4 border-b">
                    <h4 class="font-semibold">Categories & Recent Tasks</h4>
                </div>

                <div class="p-6 space-y-6">
                    @forelse($categoriesWithTasks as $category)
                        <div>
                            <h5 class="font-semibold text-gray-800 mb-2">
                                {{ $category->name }}
                            </h5>

                            @if($category->tasks->count())
                                <ul class="space-y-2 ml-4">
                                    @foreach($category->tasks as $task)
                                        <li class="flex justify-between text-sm text-gray-700">
                                            <span>• {{ $task->title }}</span>
                                            <span class="text-xs text-gray-500">
                                                {{ optional($task->due_date)->format('Y-m-d') }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-sm text-gray-500 ml-4">
                                    No tasks in this category
                                </p>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">
                            No categories yet.
                        </p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>