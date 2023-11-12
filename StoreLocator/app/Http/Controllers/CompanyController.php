<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
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
        return view('dashboard.AccountSettings')->with('companies', $company);
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
        return view('dashboard.Account.EditCompany')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
{
    try {

        $validatedData = $request->validated();

        if ($request->hasFile('companyLogo')) {

            if ($company->companyLogo) {
                Storage::disk('public')->delete($company->companyLogo);
            }

            $imagePath = $request->file('companyLogo')->store('company_logos', 'public');
            $validatedData['companyLogo'] = $imagePath;
        }

        $company->update($validatedData);

        return redirect()->route('your.route.name')->with('success', 'Company updated successfully!');
    } catch (\Exception $e) {
        \Log::error('Error updating company: ' . $e->getMessage());
        return back()->with('error', 'Error updating company. Please try again.');
    }
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
