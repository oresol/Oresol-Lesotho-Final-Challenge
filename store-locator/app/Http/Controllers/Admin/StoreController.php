<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreValidationRequest;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        return view('admin.stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreValidationRequest $request)
    {
        
        $validatedData = $request->validated();
        $existingStore = Store::where('address', $request->input('address'))->first();

        if ($existingStore) {
            return redirect()->back()->with('message', 'Store already exists.');
        }

        $validatedData['admin_id'] = auth()->user()->id;
        if ($request->has('photo')) {
            $imagePath = $request->file('photo')->store('company_images', 'public');
            $validatedData['photo'] = $imagePath;
         }
        $store = Store::create($validatedData);

        // Attach tags to the store
        $tags = $request->input('tags', []);
        $store->tags()->attach($tags);

        return redirect()->back()->with('success', 'Store created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('admin.stores.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, string $id)
    {
        $store = Store::findOrFail($id);
        $store->update($request->validated());
    
        return redirect()->back()->with('success', 'Store Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = Store::findOrFail($id);
        $store->delete();
        return redirect()->back()->with('success', 'Store deleted successfully.');
    }
}
