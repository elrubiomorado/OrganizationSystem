<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.

     * Show the form for creating a new resource.
     */
     public function index()
    {
        //
        $notes = Note::paginate(10);
        return view('notes.index', compact('notes'));
    }
    public function create()
    {
        //
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request): RedirectResponse
    {
        //
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Note::create($data);

        return redirect()
            ->route('admin.notes.index')
            ->with('message', 'Note created successfully')
            ->with('icon', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
