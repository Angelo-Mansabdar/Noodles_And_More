<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('users.index', compact('users'));
    }

    /**
     * Update the role of a user (admin <-> user).
     */
    public function updateRole(Request $request, User $user)
    {
        // Log the request to debug
        \Log::info('Updating role for user: ' . $user->id . ', new role: ' . $request->input('role'));

        // Check if the user is trying to assign 'admin' role to themselves
        if (auth()->user()->id === $user->id) {
            return redirect()->route('users.index')->with('error', 'You cannot change your own role.');
        }

        // Get the role from the request
        $newRole = $request->input('role');

        // Check if the new role is valid
        if (!in_array($newRole, ['admin', 'user'])) {
            return redirect()->route('users.index')->with('error', 'Invalid role.');
        }

        // Update the user's role
        $user->update(['role' => $newRole]);

        return redirect()->route('users.index')->with('success', 'User role updated successfully.');
    }

    public function viewMessages()
    {
        $messages = Message::all(); // Retrieve all messages
        return view('admin.messages.blade', compact('messages'));
    }

}
