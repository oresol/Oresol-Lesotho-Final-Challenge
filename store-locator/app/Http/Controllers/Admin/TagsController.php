<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(TagRequest $request)
    {
        $tag = Tag::create([
            'tag_name' => $request->input('tag_name'),
            'admin_id' => auth()->user()->id,
        ]);
    
        return redirect()->route('tags.index');
    }
    

    public function show(Tag $tag)
    {
        $admin = $tag->createdBy;
    
        return view('tags.show', compact('tag', 'admin'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update([
            'tag_name' => $request->input('tag_name')
        ]);
    
        return redirect()->route('tags.index');
    }
    

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
