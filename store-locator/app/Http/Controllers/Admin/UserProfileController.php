<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = UserProfile::all();
        return view('admin.userProfile.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.userProfile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserProfileRequest $request)
    {
      
        
        $validatedData = $request->validated();
        $existingUser = UserProfile::where('email', $request->input('email'))->first();
        $id = auth()->user()->id;
    
        if ($existingUser) {
           
            return redirect()->back()->with('message', 'User already exists.');
        }
    
        $validatedData['admin_id'] = auth()->user()->id;
        UserProfile::create($validatedData);
    
        return redirect()->back()->with('success', 'Profile Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(UpdateUserProfileRequest $request, string $id)
    {
        
        $profile = UserProfile::findOrFail($id);
        $profile->update($request->validated());
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
