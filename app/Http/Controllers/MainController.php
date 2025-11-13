<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class MainController extends Controller
{
    public function index()
    {
        // Load user's notes
        $id = session('user.id');
        $user = User::find($id)->toArray();
        $notes = User::find($id)->notes()->get()->toArray();

        echo '<pre>';
        print_r($user);
        print_r($notes);
        die;

        // Show home view
        return view('home');
    }

    public function newNote()
    {
        echo "I'm create the new note!";
    }
}
