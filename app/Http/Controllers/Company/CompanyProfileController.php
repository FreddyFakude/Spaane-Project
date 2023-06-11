<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{


    public function index()
    {
        return view('dashboard.company.company-profile',[
            'company' => auth()->guard('company')->user()->company
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'head_office_name' => 'required|string|max:255',
            'company_size' => 'required|string|max:255',
            'date_creation' => 'required|date',
            'fiscal_year_start' => 'required|date',
            'registration_number' => 'nullable|string',
            'short_description' => 'required|string|max:255',
            'company_phone_number' => 'required|numeric|starts_with:0|digits:10'
        ]);

        $company = auth()->guard('company')->user()->company->update(
            [
                'name' => $validated['company_name'],
                'head_office_name' => $validated['head_office_name'],
                'registration_number' => $validated['registration_number'],
                'company_size' => $validated['company_size'],
                'date_creation' => $validated['date_creation'],
                'fiscal_year_start' => $validated['fiscal_year_start'],
                'short_description' => $validated['short_description'],
                'phone_number' => $validated['company_phone_number'],
                'status' => Company::STATUS[2]
            ]
        );

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
