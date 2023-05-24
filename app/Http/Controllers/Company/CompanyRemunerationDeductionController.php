<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyRemunerationContribution;
use App\Models\CompanyRemunerationDeduction;
use Illuminate\Http\Request;

class CompanyRemunerationDeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view("dashboard.company.deductions.index", [
            "deductions" => auth()->user()->company->deductions
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       $validated =  $request->validate(
            [
                "name" => "required",
                "type"  => "required|in:FIXED,PERCENTAGE",
                "amount" => "required"
            ]
        );

       $deduction = CompanyRemunerationDeduction::create([
           "name" => $validated["name"],
           "type" => $validated["type"],
           "amount" => $validated["amount"],
           "company_id" => auth()->user()->company_id,
           "hash" => sha1(time())
       ]);

         foreach (auth()->user()->company->employees as $employee) {
             $employee->deductions()->create([
                 "name" => $deduction->name,
                 "company_id" => auth()->user()->company_id,
                 "amount" => $deduction->amount,
                 "type" => $deduction->type,
             ]);
         }
         return redirect()->route("dashboard.company.deductions.index")->with("success", "Deduction created successfully");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CompanyRemunerationDeduction $deduction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CompanyRemunerationDeduction $deduction)
    {
        $deduction->delete();
        return back()->with('success', 'Deduction Deleted');
    }

    public function updateStatus(CompanyRemunerationDeduction $deduction, $status='active')
    {
        $deduction->update([
            'is_active' => $status == 'active' ? true : false
        ]);

        return back()->with('success', 'Remuneration Contribution Updated');
    }
}
