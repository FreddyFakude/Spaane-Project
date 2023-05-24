<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeOtherEarningController extends Controller
{
    public function updateUpdateEarningAmount(Request $request, Employee $employee)
    {
        $validated =  $request->validate([
            'amount' => 'required|numeric',
            'id' => 'required|numeric'
        ]);

        $employee->otherEarnings()->where('id', $request->id)->update(['amount' => $validated['amount']]);
        return response()->json(['success'=> 'Earning updated successfully', 'earnings' => $employee->otherEarnings]);
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
