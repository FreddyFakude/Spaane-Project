<?php

namespace App\Http\Controllers\Company\Settings;

use App\Http\Controllers\Controller;
use App\Models\CompanyLeavePolicy;
use App\Models\CompanyLeaveType;
use App\Models\EmployeeLeaveInitialCurrentDay;
use App\Models\EmployeeLeavePolicy;
use App\Models\LeaveType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanyLeavePolicyController extends Controller
{
    public function viewCompanyLeavePolicy()
    {

        return view('dashboard.company.settings.leave_policy', [
            'leavePolicies' => LeaveType::all(),
            'companyLeavePolicies' => CompanyLeavePolicy::where('company_id', '=', \Auth::user()->company_id)->get(),
            'companyLeaveTypes' => CompanyLeavePolicy::where('company_id', '=', \Auth::user()->company_id)->with('leaveType')->get(),
        ]);
    }
    public function addCompanyLeavePolicy(Request $request)
    {

//        dd($request->all());
        $validated =  $request->validate([
            'leave_policy_type' => 'required|integer|exists:leave_types,id',
            'leave_policy_days' => 'required|integer',
        ]);

        $policy = CompanyLeavePolicy::updateOrCreate([
            'company_id' => \Auth::user()->company_id,
            'leave_type_id' => $validated['leave_policy_type'],
        ], [
            'leave_duration_days' => $validated['leave_policy_days'],
            'leave_validity_days' => 365,
        ]);

        return back()->with([
            'message' => 'Company leave policy successfully added',
            'alert-type' =>'success',
        ]);


    }
}
