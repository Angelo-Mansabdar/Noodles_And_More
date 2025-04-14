@extends('layouts.app')

@section('title', 'Products List')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-center mb-8">Menukaart</h1>

        <!-- Search Form -->
        <form action="{{ route('products.index') }}" method="GET" class="flex justify-center mb-6">
            <input type="text" name="search" placeholder="Search products..."
                class="p-2 border rounded-l-md focus:outline-none" value="{{ old('search', $search) }}">
            <button type="submit" class="p-2 bg-blue-500 text-white rounded-r-md">Search</button>
        </form>

        <!-- Display message if no products are available -->
        @if ($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <a href="{{ route('products.show', $product->id) }}"
                        class="block bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <div class="overflow-hidden">
                                <img class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110"
                                    src="https://soulfood.nl/wp-content/uploads/2021/01/tosti.jpg"
                                    alt="{{ $product->name }}">
                            </div>

                            <div class="p-6 space-y-4">
                                <h2 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h2>
                                <p class="text-gray-500 text-sm">{{ $product->description }}</p>
                                <p class="text-lg font-bold text-gray-500">${{ number_format($product->price, 2) }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="mt-4 text-center text-gray-500">No products available.</p>
        @endif
    </div>
@endsection
