<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        // Load user's notes

        // Show home view
        return view('home');
    }

    public function newNote()
    {
        echo "I'm create the new note!";
    }
}
