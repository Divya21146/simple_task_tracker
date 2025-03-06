<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-2">{{ $task->title }}</h3>
                    <p class="mb-4"><strong>Description:</strong> {{ $task->description ?? '-' }}</p>
                    <p class="mb-4"><strong>Due Date:</strong> {{ $task->due_date ? $task->due_date->format('Y-m-d') : '-' }}</p>
                    <p class="mb-4"><strong>Status:</strong> {{ $task->status }}</p>

                    <a href="{{ route('tasks.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Back to Tasks
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>