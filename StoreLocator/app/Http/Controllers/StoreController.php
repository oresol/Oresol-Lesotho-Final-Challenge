<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Tags;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        return view('dashboard.Stores.ManagePoints')->with('stores', $stores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.Stores.AddStroes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        $tags = explode(',', implode($request->tags));
        try {
            $validatedData = $request->validated();
            if ($request->has('storePhoto')) {
                $imagePath = $request->file('storePhoto')->store('store_photos', 'public');
                $validatedData['storePhoto'] = $imagePath;
            }
            $store = Store::create($validatedData);

            foreach ($tags as $tagName) {
                $tag = Tags::firstOrCreate(['tagName' => $tagName]);
                $store->tags()->attach($tag);
            }
            return back()->with('success', 'Store Added successfully!');
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('error', 'An error occurred. Please try again.' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return view('dashboard.Stores.ViewStore')->with('store', $store);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('dashboard.Stores.EditStore')->with('store', $store);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        try {
            $validatedData = $request->validated();


            if ($request->hasFile('storePhoto')) {
 
                if ($store->storePhoto) {
                    Storage::disk('public')->delete($store->storePhoto);
                }

                $imagePath = $request->file('storePhoto')->store('store_photos', 'public');
                $validatedData['storePhoto'] = $imagePath;
            }


            $store->update($validatedData);

            return redirect()->route('your.route.name')->with('success', 'Store updated successfully!');
        } catch (\Exception $e) {

            Log::error('Error updating store: ' . $e->getMessage());

            return back()->with('error', 'Error updating store. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        try {

            if ($store->storePhoto) {
                Storage::disk('public')->delete($store->storePhoto);
            }

            $store->tags()->detach();

            $store->delete();

            return view("dashboard.Stores.ManagePoints")->with('success', 'Store deleted successfully!');
        } catch (\Exception $e) {

            Log::error('Error deleting store: ' . $e->getMessage());

            return back()->with('error', 'Error deleting store. Please try again.');
        }
    }
}
