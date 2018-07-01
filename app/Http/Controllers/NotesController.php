<?php

namespace App\Http\Controllers;

use App\Note;
use Auth;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function new() {
        return view('notes.new');
    }

    public function create(Request $request) {
        $note = Note::create([
            'title' => $request->input('title'),
            'content' => $request->input('content-body'),
            'createdBy' => Auth::Id(),
            'editedBy' => Auth::Id(),
        ]);
        $note->attachTag($request->input('tags'));
        return redirect()->route('show', ['id' => $note->id]);
    }

    public function show($id) {
        return view('notes.show', ['note' => Note::find($id)->first()]);
    }
}
