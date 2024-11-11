<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyRemuneration;
use App\Models\EmployeeRemuneration;
use Illuminate\Http\Request;

class CompanyEmployeeEarningTypeController extends Controller
{
    public function showChat()
    {
        // Fetch all company remunerations
        $companyRemunerations = CompanyRemuneration::all();
        
        // Pass the data to the view
        return view('dashboard.company.chat', compact('companyRemunerations'));
    }


    // Add new earning type
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'unit_type' => 'required'
        ]);

        // Create new earning type
        $earningType = auth()->user()->company->employeeEarningTypes()->create([
            'name' => $request->name,
            'unit_type' => $request->unit_type,
            'hash' => sha1(time())
        ]);

        // Add employee remuneration records
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

    public function destroy(CompanyRemuneration $earningType)
    {
        $earningType->delete();
        return back()->with('success', 'Earning deleted');
    }

    public function updateStatus(CompanyRemuneration $remuneration, $status = 'active')
    {
        $remuneration->update([
            'is_active' => $status === 'active'
        ]);

        return back()->with('success', 'Remuneration Contribution Updated');
    }
}
