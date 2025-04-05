@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-12 p-8 bg-white shadow-xl rounded-lg">
        <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Contact Us</h2>

        @if(session('success'))
            <div class="bg-green-200 p-4 text-green-800 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('messages.store') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Your Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
            </div>

            <!-- Message -->
            <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Your Message</label>
                <textarea id="message" name="message" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" rows="6" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Submit Message
                </button>
            </div>
        </form>
    </div>
@endsection
