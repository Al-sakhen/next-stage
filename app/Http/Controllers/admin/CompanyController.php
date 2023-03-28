<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::withCount('employees')->paginate(10);
        return view('admin.company.index' , compact('companies'));
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
    public function store(CreateCompanyRequest $request)
    {
        $data = $request->except('logo');
        if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('logos' , 'public');
            $data['logo'] = $path;
        }

        Company::create($data);
        return redirect()->route('companies.index')->with('success', 'Company created successfully');
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
        $company = Company::findOrFail($id);
        return view('admin.company.edit' , compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, string $id)
    {
        $company = Company::findOrFail($id);
        $old_logo = $company->logo;
        $data = $request->except('logo');

        if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $path = $logo->store('logos' , 'public');
        }

        $data['logo'] = $path ?? $old_logo;

        $company->update($data);

        if($request->hasFile('logo') && $old_logo){
            Storage::disk('public')->delete($old_logo);
        }
        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        if($company->logo){
            Storage::disk('public')->delete($company->logo);
        }
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
