<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index()
    {
        echo "I'm inside the app!";
    }

    public function newNote()
    {
        echo "I'm create the new note!";
    }
}
