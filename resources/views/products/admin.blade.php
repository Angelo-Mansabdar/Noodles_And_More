@extends('layouts.app')

@section('title', 'Admin - Manage Products')

@section('content')
    <div class="max-w-7xl mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">Manage Products</h1>

        @if ($products->count())
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100 text-left">
                        <tr>
                            <th class="px-6 py-4">Name</th>
                            <th class="px-6 py-4">Description</th>
                            <th class="px-6 py-4">Price</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-800">{{ $product->name }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $product->description }}</td>
                                <td class="px-6 py-4 text-gray-600">€{{ number_format($product->price, 2) }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('products.edit', $product) }}"
                                        class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm">Edit</a>

                                    <!-- Delete Form -->
                                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Nee niek niet zomaar weghalen :(');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-center text-gray-500 mt-6">hey dit is leeg?</p>
        @endif
    </div>
@endsection
