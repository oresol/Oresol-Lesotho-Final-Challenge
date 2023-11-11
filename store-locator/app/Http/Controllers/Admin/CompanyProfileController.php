<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyProfileRequest;
use App\Http\Requests\UpdateCompanyProfileRequest;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = CompanyProfile::all();
        return view('admin.company.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyProfileRequest $request)
    {
        $validatedData = $request->validated();
        $adminId = auth()->user()->id;
        $existingCompany = CompanyProfile::where('admin_id', $adminId)->first();
    
        if ($existingCompany) {
            return redirect()->back()->with('error', 'You can only create one Company Profile.');
        }
        $validatedData['admin_id'] = $adminId;
        CompanyProfile::create($validatedData);
        return redirect()->back()->with('success', 'Company Profile added successfully.');
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
    public function update(StoreCompanyProfileRequest $request, string $id)
    {
        $profile = CompanyProfile::findOrFail($id);
        $profile->update($request->validated());
    
        return redirect()->back()->with('success', 'Company Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
