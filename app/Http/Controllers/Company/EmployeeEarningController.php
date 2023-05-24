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

    public function updateEarningAmount(Request $request, Employee $employee)
    {
        $validated =  $request->validate([
            'amount' => 'required|numeric',
            'id' => 'required|numeric'
        ]);

        $employee->remunerations()->where('id', $request->id)->update(['amount' => $validated['amount']]);
        return response()->json(['success'=> 'Earning updated successfully', 'earnings' => $employee->otherEarnings]);
    }
}
