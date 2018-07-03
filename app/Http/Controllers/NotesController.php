<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Note;
use Auth;

class NotesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function new() {
        return view('notes.new');
    }

    /**
     * @param NoteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(NoteRequest $request) {
        $note = Note::create([
            'title' => $request->input('title'),
            'content' => $request->input('content-body'),
            'createdBy' => Auth::Id(),
            'editedBy' => Auth::Id(),
        ]);
        $note->attachTag($request->input('tags'));
        return redirect()->route('show', ['id' => $note->id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id) {
        return view('notes.show', ['note' => Note::find($id)->first()]);
    }

    public function edit($id) {
        return view('notes.edit', ['note' => Note::find($id)->first()]);
    }
}
