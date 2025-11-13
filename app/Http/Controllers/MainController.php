<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {
        // Load user's notes
        $id = session('user.id');
        $notes = User::find($id)->notes()->get()->toArray();

        // Show home view
        return view('home', ['notes' => $notes]);
    }

    public function newNote()
    {
        echo "I'm create the new note!";
    }

    public function editNote($id)
    {
        $id = $this->decryptId($id);
        echo 'Im editing Note with ID ' . $id;
    }

    public function deleteNote($id)
    {
        $id = $this->decryptId($id);
        echo 'Im deleting Note with ID ' . $id;
    }

    private function decryptId($id)
    {
        try {
            return Crypt::decrypt($id);
        }
        catch (DecryptException $e) {
            return redirect()->route('home');
        }
    }
}
