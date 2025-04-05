<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <nav class="bg-blue-600 p-4">
                <div class="max-w-7xl mx-auto flex justify-between items-center">
                    <a href="/" class="text-white text-2xl">My App</a>
                    
                    <ul class="flex space-x-6">
                        <!-- Public link visible to everyone -->
                        <li><a href="{{ route('products.index') }}" class="text-white">Products</a></li>
            
                        <!-- Show this link if the user is logged in -->
                        @auth
                            <!-- Admin link for admins only -->
                            @if(auth()->user()->role === 'admin')
                                <li><a href="{{ route('products.admin') }}" class="text-white">Admin Panel</a></li>
                                <li><a href="{{ route('products.create') }}" class="text-white">Create Product</a></li>
                                <!-- Add Users Link for Admins -->
                                <li><a href="{{ route('users.index') }}" class="text-white">Users</a></li>
                                <!-- Messages button for Admins -->
                                <li><a href="{{ route('admin.messages') }}" class="text-white">Messages</a></li> <!-- New Messages Link -->
                            @else
                                <!-- Contact button for regular users -->
                                <li><a href="{{ route('contact') }}" class="text-white">Contact</a></li> <!-- Contact Link for Users -->
                            @endif
            
                            <!-- Logout Form -->
                            <form action="{{ route('logout') }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="text-white">Logout</button>
                            </form>                            
                        @else
                            <!-- Login and Register links if not authenticated -->
                            <li><a href="{{ route('login') }}" class="text-white">Login</a></li>
                            <li><a href="{{ route('register') }}" class="text-white">Register</a></li>
                        @endauth
                    </ul>
                </div>
            </nav>
            

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
