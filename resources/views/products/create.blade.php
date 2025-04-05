@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="max-w-4xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold mb-6">Create New Product</h1>

        <!-- Display any validation errors -->
        @if ($errors->any())
            <div class="bg-red-200 text-red-700 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Product Creation Form -->
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="space-y-6">
                <div>
                    <label for="name" class="block text-lg font-medium text-gray-700">Product Name</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full p-2 border rounded-md" value="name" placeholder="Enter product name" required>
                </div>

                <div>
                    <label for="description" class="block text-lg font-medium text-gray-700">Product Description</label>
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full p-2 border rounded-md min-h-48 max-h-48" placeholder="Enter product description" required>description</textarea>
                </div>

                <div>
                    <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
                    <input type="number" step="0.01" id="price" name="price" class="mt-1 block w-full p-2 border rounded-md" value="price" placeholder="Enter product price" required>
                </div>

                <button type="submit" class="mt-4 px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create Product</button>
            </div>
        </form>
    </div>
@endsection
