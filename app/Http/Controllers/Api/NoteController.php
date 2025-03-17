<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Http\Requests\Api\Note\StoreNoteRequest;
use App\Http\Requests\Api\Note\UpdateNoteRequest;
use App\Http\Resources\NoteResource;


class NoteController extends Controller
{
    public function index()
    {
        return NoteResource::collection(auth()->user()->notes()->paginate(10));
    }

    public function store(StoreNoteRequest $request)
    {
        $note = auth()->user()->notes()->create($request->validated());

        return response([
            'message' => 'note created successfully',
            'note' => new NoteResource($note)
        ], 201);
    }

    public function show(Note $note)
    {
        $note = auth()->user()->notes()->where('id', $note->id)->firstOrFail();

        return response([
            'note' => new NoteResource($note),
        ], 200);
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        $note->update($request->validated());

        return response([
            'message' => 'note updated successfully',
            'note' => new NoteResource($note)
        ], 200);
    }

    public function destroy(Note $note)
    {
        auth()->user()->notes()->where('id', $note->id)->firstOrFail()->delete();

        return response([
            'message' => 'note deleted successfully'
        ], 204);
    }
}
