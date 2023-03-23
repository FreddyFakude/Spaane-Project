<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyPayslip;
use App\Models\Employee;
use App\Models\Payslip;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;


class CompanyPayslipController extends Controller
{
    public function index()
    {

        return view('dashboard.company.payroll.months', [
            'payslips' => auth()->user()->company->payslips()->with('employee')->get(),
            'employees' => auth()->user()->company->employees()->get(),
        ]);
    }

    public function store(Request $request, Employee $employee)
    {

       $validated =  $request->validate([
            'basic_salary' => 'required|integer',
            'commission' => 'required|integer',
            'travel_allowance' => 'required|integer',
            'reimbursement' => 'required|integer',
            'other' => 'nullable|integer',
            'date' => 'required|date',
        ]);
       $validated['reference_number'] = 'PAYS-'. auth()->user()->company->payslips()->count() + 1;
       $validated['file_name'] = 'PAYS-'. auth()->user()->company->payslips()->count() + 1;
       $validated['hash'] = sha1(auth()->user()->company->payslips()->count() + 1);
       $validated['company_id'] = auth()->user()->company->id;
       $validated['payslip_month'] = Carbon::createFromFormat('Y-m-d', $validated['date'])->format('M');
        $payslip = $employee->payslips()->create($validated);
        return redirect()->route('dashboard.business.payroll.index')->with('payslip-added', 'Payslip created successfully');
    }


    public function show($date)
    {
        return view('dashboard.company.payroll.employee', [
            'date' => $date,
            'employees' => Employee::where('company_id', auth()->user()->company->id)->with('payslips')->get(),
        ]);
    }
}
