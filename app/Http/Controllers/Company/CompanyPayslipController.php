<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {

       $validated =  $request->validate([
            'basic_salary' => 'required|integer',
            'commission' => 'required|integer',
            'travel_allowance' => 'required|integer',
            'reimbursement' => 'required|integer',
            'other' => 'nullable|integer',
            'employee_id' => 'required|integer',
        ]);

       $validated['reference_number'] = 'PAYS-'. auth()->user()->company->payslips()->count() + 1;
       $validated['file_name'] = 'PAYS-'. auth()->user()->company->payslips()->count() + 1;
       $validated['date'] = Carbon::now()->format('Y-m-d');
       $validated['hash'] = sha1(auth()->user()->company->payslips()->count() + 1);
        $payslip = auth()->user()->company->payslips()->create($validated);
        return redirect()->route('dashboard.business.payroll.index')->with('payslip-added', 'Payslip created successfully');
    }


    public function show(Payslip $payslip, $date)
    {
        return view('dashboard.company.payroll.employee', [
            'date' => $date,
            'employees' => auth()->user()->company->employees()->with('payslips')->get(),
        ]);
    }
}
