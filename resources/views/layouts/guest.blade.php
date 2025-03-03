<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>BookWeb</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Navigation -->
        <nav class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-bold text-orange-600">BookWeb</a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('cart') }}" class="text-gray-600 hover:text-orange-600">Cart (0)</a>
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-600 hover:text-orange-600">Logout</button>
                            </form>
                        @else
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-md border border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white transition-colors">Login</a>
                            <a href="{{ route('register') }}" class="px-4 py-2 rounded-md border border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white transition-colors">
                                Sign Up
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            {{ $slot }}
        </main>
    </body>
</html>