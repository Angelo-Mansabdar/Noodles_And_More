<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('title', $product->name) <!-- Set the page title to the product's name -->

@section('content')
    <div class="product-detail">
        <h1 class="text-3xl font-semibold">{{ $product->name }}</h1>

        <p class="mt-2 text-lg text-gray-700">{{ $product->description }}</p>

        <div class="mt-4 text-xl font-bold">
            <p>Price: ${{ number_format($product->price, 2) }}</p>
        </div>

        <a href="{{ route('products.index') }}" class="mt-4 inline-block text-blue-500">Back to Products List</a>
    </div>
@endsection
