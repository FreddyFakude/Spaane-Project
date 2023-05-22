<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyRemuneration;
use App\Models\EmployeeRemuneration;
use Illuminate\Http\Request;

class CompanyEmployeeEarningTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.company.earning_type.index',
            [
                'employeeEarningTypes' => auth()->user()->company->employeeEarningTypes
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
                'name' => 'required'
            ]
        );
        $earningType = auth()->user()->company->employeeEarningTypes()->create([
            'name' => $request->name,
            'hash' => sha1(time())
        ]);

       foreach (auth()->user()->company->employees as $employee) {
           EmployeeRemuneration::updateOrCreate([
               'name' => $earningType->name,
               'employee_id' => $employee->id,
               'company_remuneration_id' => $earningType->id
           ], [
               'amount' => 0
           ]);
       }

        return redirect()->route('dashboard.company.earning_types.index')->with('success', 'Earning type created successfully');
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
     * @param  CompanyRemuneration $remuneration
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CompanyRemuneration $earningType)
    {
        $earningType->delete();
        return back()->with('success', 'Earning  deleted');
    }

    public function updateStatus(CompanyRemuneration $remuneration, $status='active')
    {
        $remuneration->update([
            'is_active' => $status == 'active' ? true : false
        ]);

        return back()->with('success', 'Remuneration Contribution Updated');
    }
}
