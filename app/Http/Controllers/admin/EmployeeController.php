<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmloyeeRequest;
use App\Http\Requests\UpdateEmloyeeRequest;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmloyeeRequest $request)
    {
        $data = $request->all();
        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
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
        $employee = Employee::findOrFail($id);
        $companies = Company::all();

        return view('admin.employee.edit', compact('employee',  'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmloyeeRequest $request, string $id)
    {
        $employee = Employee::findOrFail($id);
        $data = $request->all();

        $employee->update($data);


        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
