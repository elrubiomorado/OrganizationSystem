<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.

     * Show the form for creating a new resource.
     */
    public function index(): View
    {
        //
        $notes = Note::paginate(10);
        return view('admin.notes.index', compact('notes'));
    }
    public function create(): View
    {
        //
        return view('admin.notes.create');
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
            ->with([
                'message' => 'Note created successfully',
                'icon' => 'success',
            ]);
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
    public function edit(Note $note): View
    {
        //

        return view('admin.notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        //
        $note->update($request->validated());
        return redirect()
            ->route('admin.notes.index')
            ->with([
                'message' => 'Note updated successfully',
                'icon' => 'success',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();
        return redirect()
            ->route('admin.notes.index')
            ->with([
                'message' => 'Note deleted successfully',
                'icon' => 'success',
            ]);
    }
}
