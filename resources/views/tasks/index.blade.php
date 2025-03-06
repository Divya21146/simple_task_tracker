<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create New Task
                    </a>

                    @if (session('success'))
                        <div class="mt-4 text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mt-4">
                        @if ($tasks->count() > 0)
                            <table class="table-auto w-full">
                                <thead>
                                <tr>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Due Date</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $task->title }}</td>
                                        <td class="border px-4 py-2">{{ $task->status }}</td>
                                        <td class="border px-4 py-2">{{ $task->due_date ? $task->due_date->format('Y-m-d') : '-' }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="text-green-500 hover:text-green-700">Edit</a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No tasks found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>