<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display the message submission form.
     */
    public function create()
    {
        return view('contact'); // Your form view
    }

    /**
     * Store the user's message in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create a new message and save it
        Message::create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect()->route('contact')->with('success', 'Your message has been sent.');
    }

    /**
     * Display all the messages for the admin.
     */
    public function index()
    {
        $messages = Message::all(); // Retrieve all messages
        return view('admin.messages', compact('messages')); // Ensure this matches the path 'admin.messages'
    }
    
}
