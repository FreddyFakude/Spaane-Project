<?php


namespace App\Http\Controllers\Company;


use App\Models\CompanyLeavePolicy;
use App\Models\LeaveType;
use App\Models\Employee;
use App\Services\LeaveCalculation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboardController
{
    public function index(){
        $employees = Auth::user()->employees;
        $employees->load(['leavePolicies', 'leaveRequests']);
        return view('dashboard.company.index', [
            "employees"=>$employees,
            "businessId" =>  Auth::id(),
            "companyLeavePolicy" => Cache::get('companyLeaveTypes', function () {
                return CompanyLeavePolicy::with('leaveType')->get();
            })
        ]);
    }
}
