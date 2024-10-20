<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::where('user_id', auth()->id())->get(); 
        return view('notes.index', compact('notes'));  //edit
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create'); //edit
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'subtitle' => 'nullable|string|max:255',
            'bookmark' => 'nullable|boolean',
            'folder_id' => 'nullable|integer|exists:folders,id',
        ]);
    
        Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'subtitle' => $request->subtitle,
            'bookmark' => $request->bookmark,
            'user_id' => auth()->id(),
            'folder_id' => $request->folder_id,
        ]);
    
        return redirect()->route('notes.index')->with('success', 'Note created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403);
        }
        
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403);
        }
    
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403);
        }
    
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'subtitle' => 'nullable|string|max:255',
            'bookmark' => 'nullable|boolean',
            'folder_id' => 'nullable|integer|exists:folders,id',
        ]);
    
        $note->update($request->all());
    
        return redirect()->route('notes.index')->with('success', 'Note updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403);
        }
    
        $note->delete();
    
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }
}
