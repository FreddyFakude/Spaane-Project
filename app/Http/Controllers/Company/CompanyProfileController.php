<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.company.profile',[
            'company' => auth()->guard('company')->user()->company,
            'admin' => auth()->guard('company')->user()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'company_size' => 'required|string|max:255',
            'date_creation' => 'required|date',
            'dob' => 'required|date',
            'fiscal_year_start' => 'required|date',
            'short_description' => 'required|string|max:255',
            'company_phone_number' => 'required|numeric|starts_with:0|digits:10',
            'gender' => 'nullable|string|max:255',
        ]);

        $company = auth()->guard('company')->user()->company->update(
            [
                'name' => $validated['company_name'],
                'company_size' => $validated['company_size'],
                'date_creation' => $validated['date_creation'],
                'fiscal_year_start' => $validated['fiscal_year_start'],
                'short_description' => $validated['short_description'],
                'phone_number' => $validated['company_phone_number'],
                'status' => Company::STATUS[2]
            ]
        );

        $user = auth()->guard('company')->user()->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'gender'=> $validated['gender'],
            'dob' => $validated['dob'],
        ]);

        return redirect()->route('dashboard.company.index')->with('success', 'Profile updated successfully');
    }
}
