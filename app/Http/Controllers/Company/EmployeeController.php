<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\TalentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
