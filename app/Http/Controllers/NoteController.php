<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Notes::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $title = $request->note['title'];
        $content = $request->note['content'];
        $newNote = new Notes;

        $newNote->title = $title;
        $newNote->content = $content;
        $newNote->save([$title, $content]);
        return $newNote;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return Notes::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $existingNote = Notes::find($id);
        if ($existingNote) {
            
            $existingNote->title = $request->note['title'];
            $existingNote->content = $request->note['content'];
            $rec = $existingNote->save();
            
            return "Note updated Successfully";
        }
        return "Note Not found";

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Notes::find($id);
        if ($item) {
            $item->delete();
            return "Note Deleted Successfully";
        }
        return "Item Not found";
    }
}
