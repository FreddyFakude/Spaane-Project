<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeEarningController extends Controller
{

    public function index(Employee $employee)
    {
        return response()->json(['earnings' => $employee->otherEarnings]);
    }

    public function store(Request $request, Employee $employee)
    {
       $validated =  $request->validate([
            'name' => 'required',
            'amount' => 'required|numeric'
        ]);

        $employee->otherEarnings()->create($validated);
        return response()->json(['success'=> 'Earning added successfully', 'earnings' => $employee->otherEarnings]);
    }
}
