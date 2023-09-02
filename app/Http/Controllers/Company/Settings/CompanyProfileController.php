<?php

namespace App\Http\Controllers\Company\Settings;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Repository\AddressRepository;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{


    public function index()
    {
        return view('dashboard.company.settings.company-profile',[
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
            'company_phone_number' => 'required|numeric|starts_with:0|digits:10',
            "street_number"=>"required",
            "street_name"=>"required",
            "suburb"=>"nullable",
            "city"=>"required|nullable",
            "state"=>"required",
            "zip_code"=>"nullable",
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
        $company = auth()->guard('company')->user()->company;
        if ($company->address){
            $company->address->update(
                ["street_number" => $validated['street_number'],
                "street_name" => $validated['street_name'],
                "suburb" => $validated['suburb'],
                "city" => $validated['city'],
                "state" => $validated['state'],
                "zip_code" => $validated['zip_code'],
                "country" => "South Africa",
                "addressable_id" => $company->id,
                "addressable_type" => Company::class
                ]);
        }
        else{
          $address = (new AddressRepository())->insert($validated, $company->id, Company::class);
        }
  ;
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
