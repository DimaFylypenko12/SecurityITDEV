@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <!-- Navigation -->
    <nav class="bg-red-100/80 backdrop-blur-xl border-b border-red-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('tasks.index') }}" class="text-red-600 hover:text-red-800 transition-colors">
                        ← Back to Tasks
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="backdrop-blur-xl bg-white/80 border border-red-200 rounded-xl p-8 shadow-xl">
                <h1 class="text-2xl font-bold text-center bg-clip-text text-transparent bg-gradient-to-r text-black from-red-500 to-red-600 mb-6">
                    Create New Task
                </h1>

                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-200 rounded-lg">
                        <ul class="list-disc list-inside text-red-600">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="title" class="block text-sm font-medium text-red-700 mb-1">Title</label>
                        <input type="text" name="title" id="title" required
                               class="w-full px-4 py-2 bg-red-50 border border-red-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors"
                               placeholder="Enter task title">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-red-700 mb-1">
                            Description (optional) - <span id="char-count" class="text-red-500">0/500</span>
                        </label>
                        <textarea name="description" id="description"
                                  maxlength="500"
                                  class="w-full px-4 py-2 bg-red-50 border border-red-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors h-32"
                                  placeholder="Enter task description"></textarea>
                    </div>

                    <button type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-black font-medium rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105">
                        Create Task
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
