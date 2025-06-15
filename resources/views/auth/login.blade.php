<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 antialiased min-h-screen flex items-center justify-center">

<div class="w-full max-w-md px-6 py-10 bg-white shadow-xl rounded-xl">
    <!-- Header -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold text-red-600">Welcome Back</h1>
        <p class="mt-2 text-gray-500">Sign in to your account</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address</label>
            <input type="email"
                   name="email"
                   id="email"
                   value="{{ old('email') }}"
                   required
                   autofocus
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-400 focus:outline-none placeholder-gray-400"
                   placeholder="you@example.com">
            @error('email')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password"
                   name="password"
                   id="password"
                   required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-400 focus:outline-none placeholder-gray-400"
                   placeholder="••••••••">
            @error('password')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input type="checkbox"
                   name="remember"
                   id="remember"
                   class="h-4 w-4 text-red-500 border-gray-300 rounded focus:ring-red-400">
            <label for="remember" class="ml-2 block text-sm text-gray-600">
                Remember me
            </label>
        </div>

        <!-- Form actions -->
        <div class="flex items-center justify-between">
            <div class="text-sm space-y-1">
                <a href="{{ route('register') }}" class="text-red-500 hover:underline">Create an account</a><br>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-red-500 hover:underline">Forgot password?</a>
                @endif
            </div>
            <button type="submit"
                    class="inline-block px-6 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-1 transition">
                Sign In
            </button>
        </div>
    </form>
</div>

</body>
</html>
