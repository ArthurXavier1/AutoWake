<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function exibe_chatbot()
    {
        return view('chatbot');
    }
}
