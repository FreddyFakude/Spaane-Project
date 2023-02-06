<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Mail\EmployeeInvite;
use App\Models\Employee;
use App\Models\EmployeeLeaveDay;
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
            "position" => "required",
            "mobile_number" => "required|numeric|starts_with:0|digits:10|unique:employees"
        ]);

        $validated["mobile_number"] = "27" . substr($validated["mobile_number"], 1); //remove zero and add prefix
        $businessAdmin = Auth::guard('company')->user();
//        $employee = Employee::create([
//            "department_id" => 16,
//            "business_id" => $businessAdmin->business_id
//        ]);

        $employee = Employee::create([
            "name" => $validated['first_name'],
            "first_name" => $validated['first_name'],
            "last_name" => $validated['last_name'],
            "email" => $validated['email'],
            "mobile_number" => $validated['mobile_number'],
            "marital_status" => '',
            "password" => Hash::make('password'),
            "company_department_id" => 16,
            "company_id" => $businessAdmin->company_id,
//            "talent_profileable_id" => $employee->id,
            "role" => $validated['position']
        ]);

        $leaveDays =  EmployeeLeaveDay::create([
            "employee_id"=> $employee->id
        ]);

        $email = Mail::to($validated['email'])->queue(new EmployeeInvite($validated['first_name'], $businessAdmin));

        session()->flash('talent-added');
        return back();
    }
}
