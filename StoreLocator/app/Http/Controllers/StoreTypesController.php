<?php

namespace App\Http\Controllers;

use App\Models\StoreTypes;
use App\Http\Requests\StoreStoreTypesRequest;
use App\Http\Requests\UpdateStoreTypesRequest;

class StoreTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storeTypes = StoreTypes::all();
        return view('dashboard.StoreTypes')->with('storeTypes', $storeTypes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.StoreTypes.AddTypes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreTypesRequest $request)
    {
         StoreTypes::create($request->validated());
        return back()->with('success', 'Store Type Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(StoreTypes $storeTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreTypes $storetype)
    {
          return view('dashboard.StoreTypes.EditTypes')->with('storetype', $storetype);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreTypesRequest $request, StoreTypes $storetype)
    {
        $storetype->update($request->validated());
        return back()->with('success', 'Store Type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreTypes $storetype)
    {
        $storetype->delete();
        return back()->with('success', 'Store Type deleted successfully!');
    }
}
