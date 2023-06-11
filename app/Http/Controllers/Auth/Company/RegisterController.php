<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyAccountAdministrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{


    public function __construct()
    {
        $this->middleware(['guest:company']);
    }

    public function index()
    {
        return view('auth.company.register');
    }

    public function store(Request $request)
    {
       $validated =  $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $company = Company::create([
                'name' => "Temporary",
                'head_office_name' => 'Temporary',
                'company_size' => Company::size[1],
                'date_creation' => today()->format('Y-m-d'),
                'fiscal_year_start' => today()->format('Y-m-d'),
                'short_description' => 'Lorem ipsum',
                'phone_number' => '2778129193',
            ]
        );

       $user = CompanyAccountAdministrator::create([
           'company_id' => $company->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role_id' => 1,
        ]);

        Auth::guard("company")->login($user);

        return redirect()->route('dashboard.company.index');
    }
}
