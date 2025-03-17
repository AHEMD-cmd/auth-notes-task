<?php

namespace App\Http\Controllers\Website;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\website\Note\StoreNoteRequest;
use App\Http\Requests\website\Note\UpdateNoteRequest;

class NoteController extends Controller
{
    public function index()
    {
        $notes = auth()->user()->notes;
        return view('notes.index', compact('notes'));
    }

    public function store(StoreNoteRequest $request)
    {
        auth()->user()->notes()->create($request->validated());
        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        $note->update($request->validated());
        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    public function destroy(Note $note)
    {
        auth()->user()->notes()->where('id', $note->id)->firstOrFail()->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}