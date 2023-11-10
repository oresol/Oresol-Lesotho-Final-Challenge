<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Tag;
use App\Models\Type;
use App\DTO\StoreDto;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['getStores']);
    }

    private function createStoreDto($store)
    {
        $storeDto = new StoreDto();

        $storeDto->id = $store->id;
        $storeDto->name = $store->name;
        // $storeDto->type = $store->type->typename;
        $storeDto->type = Type::find($store->type_id)->typename; 
        $storeDto->latitude = $store->latitude;
        $storeDto->longitude = $store->longitude;
        $storeDto->image = $store->image;
        $storeDto->address = $store->address;
        $storeDto->telephone = $store->telephone;
        return $storeDto;
    }

    public function getStores(){

        $stores = Store::all();
        
        $storesDto = [];
        foreach ($stores as $store) {
            $storeDto = $this->createStoreDto($store);

            $tags = "";
            foreach ($store->tags as $tag) {
                $tags = $tags."#".$tag->tagname." ";
            }
            $storeDto->tags = $tags;

            array_push($storesDto, $storeDto);
        }
        
        $response['data'] = $storesDto;
        return response()->json($response);
    }

    public function getStoresByType(int $type)
    {

        $stores = DB::select( DB::raw("SELECT * FROM stores WHERE type_id = :var"), 
                    array('var'=>$type));
        
        $storesDto = [];
        
        foreach ($stores as $store) {
            $storeDto = $this->createStoreDto($store);

            $tags = DB::select( DB::raw("SELECT tagname FROM tags WHERE id IN (Select tag_id from store_tag WHERE store_id = :var)"), 
                    array('var'=>$store->id));

            $tagsNw = "";
            foreach ($tags as $tag) {
                $tagsNw = $tagsNw."#".$tag->tagname." ";
            }
            $storeDto->tags = $tagsNw;
            array_push($storesDto, $storeDto);


        }
        $response['data'] = $storesDto;
        return response()->json($response);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();

        return view("stores.index",['stores'=> $stores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view("stores.create",['types'=> $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        $img_ext = $request->file('image')->getClientOriginalExtension();
        $filename = time() . '.' . $img_ext;

        $request->image->move(public_path('images'), $filename);
        
        $store = auth()->user()->stores()->create([
            'name' => $request->name,
            'image' => $filename,
            'telephone' => $request->telephone,
            'longitude' => (double)$request->longitude,
            'latitude' => (double)$request->latitude,
            'address' => $request->address,
            'type_id' => $request->typename
        ]);
        
        $tags = explode(',', $request->tags);

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['tagname' => trim($tagName)]);
            $store->tags()->attach($tag);
        }
        

        return back()->with('success', 'Store Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        // $id = (int)$id;

        $store = Store::find($id);

        $types = Type::all();
        $store_tags = $store->tags->implode('tagname', ', ');

        return view("stores.edit",['store'=>$store,'types'=> $types, 'tags'=> $store_tags]);
    }

    public function delete(int $id)
    {
        $store = Store::find($id);

        return view("stores.delete",['store'=>$store]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, Store $store)
    {
        $img_ext = $request->file('image')->getClientOriginalExtension();
        $filename = time() . '.' . $img_ext;
        $request->image->move(public_path('images'), $filename);

        $this->removeImage($store->image);
        
        $store->update([
            'name' => $request->name,
            'image' => $filename,
            'telephone' => $request->telephone,
            'longitude' => (double)$request->longitude,
            'latitude' => (double)$request->latitude,
            'address' => $request->address,
            'type_id' => $request->typename
        ]);
        
        $tags = explode(',', $request->tags);
        $newTags = [];

        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['tagname' => trim($tagName)]);
            array_push($newTags, $tag->id);
        }
        $store->tags()->sync($newTags);

        return redirect('/');//->with('success', 'Store Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {        
        $this->removeImage($store->image);
        
        $store->tags()->detach();
        $store->delete();

        return redirect('/');
    }

    private function removeImage(string $image)
    {
        if(file_exists(public_path('images/'.$image)))
        {
            unlink(public_path('images/'.$image));
        }
    }
}
