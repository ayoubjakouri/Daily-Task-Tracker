<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Task') }}</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-4">
        <div class="p-4 border rounded">
            <h3 class="text-lg font-semibold">{{ $task->title }}</h3>
            <div class="text-sm text-gray-600">Category: {{ $task->category?->name ?? '—' }}</div>
            <div class="mt-2">{{ $task->description }}</div>
            <div class="mt-2 text-sm text-gray-600">Due: {{ optional($task->due_date)->format('Y-m-d') ?? '—' }}</div>
            <div class="mt-2 text-sm">Status: {{ $task->completed_at ? 'Completed' : 'Incomplete' }}</div>
            <div class="mt-4">
                <a href="{{ route('tasks.index') }}" class="text-sm text-gray-600">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
