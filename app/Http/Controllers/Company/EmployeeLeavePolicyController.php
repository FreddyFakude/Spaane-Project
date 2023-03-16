<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyLeavePolicy;
use App\Models\Employee;
use App\Models\EmployeeLeaveInitialCurrentDay;
use App\Models\EmployeeLeavePolicy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeLeavePolicyController extends Controller
{
    public function addLeavePolicy(Request $request, Employee $employee)
    {
       $validated =  $request->validate([
            'leave_policy.days' => 'required',
            'leave_policy.company_leave_policy_id' => 'exists:company_leave_policies,id',
        ]);

       $companyLeavePolicy = CompanyLeavePolicy::findOrfail($validated['leave_policy']['company_leave_policy_id']);

       $policy = EmployeeLeavePolicy::updateOrCreate([
            'employee_id' => $employee->id,
            'company_leave_policy_id' => $validated['leave_policy']['company_leave_policy_id'],
        ], [
            'days' => $validated['leave_policy']['days'],
            'company_id' => $employee->company_id,
            'leave_type_id' => $companyLeavePolicy->leave_type_id,
            'leave_validity_days' => $companyLeavePolicy->leave_validity_days,
        ]);

       $initialDays = EmployeeLeaveInitialCurrentDay::create([
            'employee_id' => $employee->id,
            'leave_type_id' => $policy->leave_type_id,
            'leave_type_name' => $policy->leaveType->name,
            'leave_policy_id' => $policy->id,
            'days' => $validated['leave_policy']['days'],
            'expiry_date' => Carbon::now()->addDays($policy->leave_validity_days)->format('Y-m-d'),
           "company_id" => $employee->company_id,
        ]);

        return back()->with([
            'message' => 'Employee leave policy successfully added',
            'alert-type' =>'success',
        ]);


    }
}
