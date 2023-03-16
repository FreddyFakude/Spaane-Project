<?php


namespace App\Http\Controllers\Company;


use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index(){
        $employees = Employee::where('is_profile_complete', '=', false)->get();
        return view('dashboard.company.index', [
            "employees"=>$employees->load('initialLeaveTypeDays'),
            "businessId" =>  Auth::id()
        ]);
    }
}
