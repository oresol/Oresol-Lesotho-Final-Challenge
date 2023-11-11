<?php

namespace App\Http\Controllers;
use App\Models\Tags;
use App\Http\Requests\StoreTagsRequest;
use App\Http\Requests\UpdateTagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tags::all();
        return view('dashboard.Tags')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.Tags');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagsRequest $request)
    {
        Tags::create($request->validated());
        return back()->with('success', 'Tag Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tags $tag)
    {
        //return view('posts.edit')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tags $tags)
    {
        return back()->with('success', 'Tag updated successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagsRequest $request, Tags $tags)
    {
        $tags->update($request->validated());
        return back()->with('success', 'Tag updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tags $tag)
    {
        $tag->delete();
        return back()->with('success', 'Tag deleted successfully!');
    }
}
