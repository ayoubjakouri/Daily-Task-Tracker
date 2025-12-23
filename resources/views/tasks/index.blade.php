<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tasks') }}</h2>
            <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">{{ __('Add Task') }}</a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto p-4">
        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <div class="space-y-4">
            @forelse($tasks as $task)
                <div class="p-4 border rounded flex justify-between items-center">
                    <div>
                        <div class="font-semibold">{{ $task->title }}</div>
                        <div class="text-sm text-gray-600">{{ $task->category?->name ?? 'No category' }} • Due: {{ optional($task->due_date)->format('Y-m-d') ?? '—' }}</div>
                    </div>

                    <div class="flex items-center space-x-2">
                        @if($task->completed_at)
                            <form action="{{ route('tasks.incomplete', $task) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 bg-yellow-500 text-white rounded text-sm">Mark Incomplete</button>
                            </form>
                        @else
                            <form action="{{ route('tasks.complete', $task) }}" method="POST">
                                @csrf
                                <button class="px-3 py-1 bg-green-600 text-white rounded text-sm">Mark Complete</button>
                            </form>
                        @endif

                        <a href="{{ route('tasks.edit', $task) }}" class="px-3 py-1 bg-gray-200 rounded text-sm">Edit</a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded text-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-gray-600">No tasks yet.</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
