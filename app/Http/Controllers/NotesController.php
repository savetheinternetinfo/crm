<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Note;
use Snarl;
use Auth;
use Carbon\Carbon;

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
        $note->attachTags(explode(',', $request->input('tags')));
        return redirect()->route('show', ['id' => $note->id]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id) {
        return view('notes.show', ['note' => Note::find($id)]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id) {
        return view('notes.edit', ['note' => Note::find($id)]);
    }

    /**
     * @param int $id
     * @param NoteRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edited(int $id, NoteRequest $request) {
        $note = Note::find($id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content-body'),
            'editedBy' => Auth::Id(),
            'updated_at' => Carbon::now()
        ]);
        if($note)
            Note::find($id)->first()->syncTags(explode(',', $request->input('tags')));

        return redirect()->route('show', ['id' => $id]);
    }

    public function delete(int $id) {
        Note::find($id)->delete();
        return redirect()->route('home');
    }
}
