<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternalChatController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->orderBy('created_at', 'asc')->get();
        return view('internal_chat', compact('messages'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return response()->json(['success' => true]);
    }

    public function getMessages()
    {
        $messages = Message::with('user')->orderBy('created_at', 'asc')->get();
        return response()->json($messages);
    }
}
