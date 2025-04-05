@extends('layouts.app')  <!-- Extends the app layout -->

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-4">User Messages</h1>

        <!-- Success message (if any) -->
        @if (session('success'))
            <div class="mb-4 text-center text-green-600 bg-green-100 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- If no messages exist -->
        @if ($messages->isEmpty())
            <div class="text-center text-yellow-600 bg-yellow-100 p-3 rounded">
                No messages found.
            </div>
        @else
            <!-- Messages table -->
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 text-left font-medium text-gray-600">Name</th>
                        <th class="py-2 px-4 text-left font-medium text-gray-600">Email</th>
                        <th class="py-2 px-4 text-left font-medium text-gray-600">Message</th>
                        <th class="py-2 px-4 text-left font-medium text-gray-600">Sent At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2 px-4 text-gray-800">{{ $message->name }}</td>
                            <td class="py-2 px-4 text-gray-800">{{ $message->email }}</td>
                            <td class="py-2 px-4 text-gray-800">{{ \Str::limit($message->message, 50) }}</td>
                            <td class="py-2 px-4 text-gray-600">{{ $message->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
