<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BookWeb') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="text-3xl font-bold text-orange-600">BookWeb</a>
                </div>

                <div class="hidden sm:flex sm:items-center sm:space-x-8">
                    <a href="{{ route('shop') }}" class="text-lg text-gray-600 hover:text-orange-600">Shop</a>
                    <a href="{{ route('donate') }}" class="text-lg text-gray-600 hover:text-orange-600">Donate</a>
                    <a href="{{ route('about') }}" class="text-lg text-gray-600 hover:text-orange-600">About</a>
                    <a href="{{ route('contact') }}" class="text-lg text-gray-600 hover:text-orange-600">Contact</a>
                </div>

                <div class="flex items-center space-x-4">
                <a href="{{ route('cart') }}" class="text-lg text-gray-600 hover:text-orange-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-1.707 1.107-2.707.5C10.592 17 12 18.408 12 20.408a1 1 0 01-1 1h-2a1 1 0 01-1-1c0-2.001 1.408-3.408 3.408-3.408z" />
                    </svg>
                    Cart
                </a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-lg text-gray-600 hover:text-orange-600">Dashboard</a>
                        <a href="{{ route('orders.index') }}" class="text-lg text-gray-600 hover:text-orange-600">Order History</a>
                        <a href="{{ route('donations.index') }}" class="text-lg text-gray-600 hover:text-orange-600">My Donations</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-lg text-gray-600 hover:text-orange-600">Logout</button>
                        </form>
                    @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-md border border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white transition-colors">Login</a>
                        <a href="{{ route('register') }}"
                            class="text-lg px-4 py-2 rounded-md border border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white transition-colors">
                            Sign Up
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>
</body>
</html>