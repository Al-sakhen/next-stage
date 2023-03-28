<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index() {
        $companies_count = Company::count();
        $employees_count = Employee::count();
        return view('admin.index' , compact('companies_count' , 'employees_count'));
    }
}
