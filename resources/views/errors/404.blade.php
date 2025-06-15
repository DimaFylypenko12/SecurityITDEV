@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-6xl font-extrabold text-red-700 mb-4">404</h1>
        <p class="text-xl text-red-500 mb-8">
            Oops! The page you're looking for doesn't exist.
        </p>

        <a href="{{ url('/') }}"
           class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-700 text-white font-medium rounded-full hover:from-red-600 hover:to-red-800 transition-all duration-200 transform hover:scale-105">
            Return Home
        </a>
    </div>
@endsection
