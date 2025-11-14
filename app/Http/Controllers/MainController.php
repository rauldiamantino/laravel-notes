<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

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
        // Show new note view
        return view('new_note');
    }

    public function newNoteSubmit(Request $request)
    {
        // Validate request
        $request->validate(
            // rules
            [
                'text_title' => 'required|min:3|max:200',
                'text_note' => 'required|min:3|max:3000',
            ],
            // error messages
            [
                'text_title.required' => 'O título é obrigatório',
                'text_title.min' => 'O título deve ter pelo menos :min caracteres',
                'text_title.max' => 'O título deve ter pelo menos :max caracteres',

                'text_note.required' => 'A nota é obrigatória',
                'text_note.min' => 'A nota deve ter pelo menos :min caracteres',
                'text_note.max' => 'A nota deve ter pelo menos :max caracteres',
            ],
        );

        // Get User ID
        $id = session('user.id');

        // Create new note
        $note = new Note();
        $note->user_id = $id;
        $note->title = $request->text_title;
        $note->text = $request->text_note;
        $note->save();

        // Redirect to Home
        return redirect()->route('home');
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);

        // Load note
        $note = Note::find($id);

        // Show edit note view
        return view('edit_note', ['note' => $note]);
    }

    public function deleteNote($id)
    {
        $id = Operations::decryptId($id);
        echo 'Im deleting Note with ID ' . $id;
    }
}
