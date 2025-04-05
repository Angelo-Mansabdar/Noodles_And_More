@extends('layouts.app')

@section('title', 'Welcome to NoodlesAndMore')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-8">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-500 rounded-lg p-10 shadow-xl text-white">
            <div class="max-w-2xl mx-auto text-center">
                <h1 class="text-5xl font-extrabold leading-tight mb-6">Welcome to NoodlesAndMore</h1>
                <p class="text-lg mb-6">Savor the taste of meticulously crafted noodle dishes, made fresh with love and passion.</p>
                <a href="{{ route('products.index') }}" class="inline-block bg-white text-gray-900 py-3 px-6 rounded-full text-xl font-semibold hover:bg-gray-100 transition duration-300 ease-in-out">Explore Our Menu</a>
            </div>
        </div>

        <!-- Additional Section: Why Choose Us? -->
        <div class="mt-20 text-center">
            <h2 class="text-4xl font-semibold text-gray-800 mb-8">Why Choose Us?</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-12">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 ease-in-out transform hover:scale-105">
                    <h3 class="text-2xl font-semibold text-gray-800">Fresh & Authentic</h3>
                    <p class="mt-4 text-gray-600">Every dish is made with fresh ingredients, preserving the authentic taste of traditional noodles.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 ease-in-out transform hover:scale-105">
                    <h3 class="text-2xl font-semibold text-gray-800">Artisan Craft</h3>
                    <p class="mt-4 text-gray-600">Our chefs handcraft each bowl of noodles, ensuring a unique experience in every bite.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 ease-in-out transform hover:scale-105">
                    <h3 class="text-2xl font-semibold text-gray-800">Perfect Ambience</h3>
                    <p class="mt-4 text-gray-600">Relax and unwind in a modern, stylish environment designed for ultimate comfort.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
