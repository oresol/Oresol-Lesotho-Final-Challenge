<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));

       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $existingTag = Tag::where('tag_name', $request->input('tag_name'))->first();
        $id = auth()->user()->id;

    
        if ($existingTag) {
           
            return redirect()->back()->with('message', 'Tag already exists.');
        }
    
        $tag = Tag::create([
            'tag_name' => $request->input('tag_name'),
            'admin_id' => $id,
        ]);
    
        return redirect()->back()->with('success', 'Tag created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = $tag->createdBy;
    
        return view('tags.show', compact('tag', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update([
            'tag_name' => $request->input('tag_name')
        ]);
    
        return redirect()->back()->with('success', 'Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->back()->with('success', 'Tag deleted successfully.');
    }
}
