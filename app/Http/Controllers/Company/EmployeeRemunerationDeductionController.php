<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeRemunerationDeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Employee $employee)
    {
        return response()->json([
            "deductions" => $employee->otherDeductions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Employee $employee)
    {

            $validated = $request->validate([
                'name' => 'required',
                'amount' => 'required'
            ]);

            $employee->otherDeductions()->create([
                'name' => $request->name,
                'amount' => $request->amount
            ]);

            return response()->json([
                "message" => "Deduction added successfully",
                "deductions" => $employee->otherDeductions
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Employee  $employee
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'amount' => 'required',
        ]);

        $employee->otherDeductions()->where('id', $request->id)->update([
            'amount' => $request->amount
        ]);

        return response()->json([
            "message" => "Deduction updated successfully",
            "deductions" => $employee->otherDeductions
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
