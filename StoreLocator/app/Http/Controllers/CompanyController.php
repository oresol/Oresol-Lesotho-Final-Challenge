<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::all();
        return view('dashboard.AccountSettings')->with('company', $company);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.AccountSettings');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreCompanyRequest $request)
    // {
    //     try{
    //         $validatedData = $request->validated();
    //         $imagePath = $request->file('companyLogo')->store('company_logos', 'public');
    //         $validatedData['companyLogo'] = $imagePath;
    //          $validatedData['user_id'] = Auth::id();
    //         Company::create($validatedData);
    //         return back()->with('success', 'Company Added successfully!');  
    //     }catch(Exception $e){
    //         return back()->with('error', $e);
    //     }
           
    // }

    public function store(StoreCompanyRequest $request)
    {
    try {

        // dd($request->all());

        $validatedData = $request->validated();
        if ($request->has('companyLogo')) {
            $imagePath = $request->file('companyLogo')->store('company_logos', 'public');
            $validatedData['companyLogo'] = $imagePath;
        }
        Company::create($validatedData);
        return back()->with('success', 'Company Added successfully!');
    } catch (\Exception $e) {
        // Handle the exception, log the error, or return an error response
        return back()->with('error', 'Error adding company: ' . $e->getMessage());
    }
    }


    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('dashboard.AccountSettings')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
        return back()->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return back()->with('success', 'Company deleted successfully!');
    }
}
