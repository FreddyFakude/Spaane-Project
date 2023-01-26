<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Mail\EmployeeInvite;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function list()
    {

        return view(
            'dashboard.company.employee-list',
            [
                'employees' => Auth::user()->employees
            ]);
    }

    public function viewTalent(Employee $employee){
        return view('dashboard.company.internal_talent', [
            'employee' => $employee
        ]);
    }

    public function inviteEmployee(Request $request)
    {
        $validated = $request->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"required|email",
            "position" => "required"
        ]);

        $businessAdmin = Auth::guard('company')->user();
//        $employee = Employee::create([
//            "department_id" => 16,
//            "business_id" => $businessAdmin->business_id
//        ]);

        $profile  = Employee::create([
            "name" => $validated['first_name'],
            "first_name" => $validated['first_name'],
            "last_name" => $validated['last_name'],
            "email" => $validated['email'],
            "marital_status" => '',
            "password" => Hash::make('password'),
//            "talent_profileable_type" => "App\Models\Employee",
//            "talent_profileable_id" => $employee->id,
            "role" => $validated['position']
        ]);


        $email = Mail::to($validated['email'])->queue(new EmployeeInvite($validated['first_name'], $businessAdmin));

        session()->flash('talent-added');
        return back();
    }
}
