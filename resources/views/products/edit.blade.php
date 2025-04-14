@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-8">
        <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

        <form method="POST" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')

            {{-- old bewaart de ingevulde waarde als een submit faalt voor wat voor reden dan ook --}}
            <div class="mb-4">
                <label for="name" class="block font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                    class="mt-1 block w-full p-2 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" required
                    class="mt-1 block w-full p-2 border rounded-md max-h-48 resize-y">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}"
                    step="0.01" required class="mt-1 block w-full p-2 border rounded-md">
            </div>

            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">Update
                Product</button>
        </form>
    </div>
@endsection
