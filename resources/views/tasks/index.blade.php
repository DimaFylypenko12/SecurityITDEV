@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <!-- Navigation -->
    <nav class="bg-red-100/80 backdrop-blur-xl border-b border-red-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-4">
                    <span class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-500 to-red-600">
                        Your Tasks
                    </span>
                    <!-- About Button -->
                    <a href="/about"
                       class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-medium rounded-full hover:from-red-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105">
                        About
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white font-medium rounded-full hover:from-red-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col items-center justify-center text-center mb-8">
            <h1 class="text-2xl font-bold text-red-800 mb-2">My TASKS TEST APP</h1>
            <p class="text-red-600 mb-6">LIST of your tasks:</p>
            <a href="{{ route('tasks.create') }}"
               class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-black font-medium rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105">
                Create New Task
            </a>
        </div>

        <!-- Tasks List -->
        <div class="grid gap-4 md:grid-cols-1 lg:grid-cols-1">
            @forelse($tasks as $task)
                <div class="group bg-white/80 p-4 shadow-lg border border-red-200 transform transition-all duration-200 cursor-pointer relative"
                     onclick="window.location='{{ route('tasks.edit', $task) }}'">
                    <h3 class="text-lg font-semibold text-red-800 mb-4">
                        {{ $task->title }}
                    </h3>
                    <div class="mb-4">
                        <p class="text-red-600 text-sm">
                            {{ Str::limit($task->description, 50) }}
                            @if (strlen($task->description) > 50)
                                <span class="text-red-500">...</span>
                            @endif
                        </p>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="px-4 py-2 bg-red-500 text-black text-sm rounded-full hover:bg-red-600 transition-colors"
                           onclick="event.stopPropagation();">
                            Edit
                        </a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-700 text-black text-sm rounded-full hover:bg-red-800 transition-colors"
                                    onclick="event.stopPropagation() && confirm('Are you sure you want to delete this task?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-red-500 text-lg">
                        No tasks yet. Start by creating one!
                    </p>
                </div>
            @endforelse
        </div>
    </main>
@endsection
